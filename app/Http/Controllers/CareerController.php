<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Mail\SendJobTask;
use Illuminate\Support\Facades\Mail;
use App\Models\JobListing;

class CareerController extends Controller
{
    public $path = "admin.pages.career.";

    /**
     * Display listing / ajax / export
     */
    public function index(Request $request)
    {
        $export_xls = $request->input('export_xls');
        $queryParam = $request->input('query');
        $experience = $request->input('experience');
        $role       = $request->input('role');     // filter via AJAX
        $status     = $request->input('status');   // (optional) future filter

        $query = Career::when($queryParam, function ($q) use ($queryParam) {
                    $q->where('name', 'like', "%{$queryParam}%")
                      ->orWhere('email', 'like', "%{$queryParam}%")
                      ->orWhere('phone', 'like', "%{$queryParam}%")
                      ->orWhere('role', 'like', "%{$queryParam}%");
                })
                ->when($experience, fn($q) => $q->where('experience', $experience))
                ->when($role,       fn($q) => $q->where('role', $role))
                ->when($status,     fn($q) => $q->where('status', $status)); // optional

        // Export (respects filters)
        if ((int)$export_xls === 1) {
            return $this->exportXls($query);
        }

        // DataTables AJAX
        if ($request->ajax()) {
    $columns = ['name','phone','email','resume_path','role','state','experience','status','created_at'];

    if ($search = $request->input('search.value')) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('role', 'like', "%{$search}%");
        });
    }

    $recordsTotal    = Career::count();
    $recordsFiltered = $query->count();

    $orderColumnIndex = (int) $request->input('order.0.column', 8);
    $orderColumn = $columns[$orderColumnIndex] ?? 'created_at';
    $orderDir    = $request->input('order.0.dir', 'desc');

    // ✅ SAFE PAGINATION
    $start  = (int) $request->input('start', 0);
    $length = $request->has('length') ? (int) $request->input('length') : 10;
    // optional clamp to protect DB
    if ($length > 100 && $length !== -1) { $length = 100; }

    $q2 = $query->orderBy($orderColumn, $orderDir);

    if ($length === -1 || $length === 0) {
        $careers = $q2->get(); // no OFFSET-only SQL
    } else {
        $careers = $q2->skip($start)->take($length)->get();
    }

    $data = [];
    foreach ($careers as $career) {
        $job = JobListing::where('title', $career->role)
            ->whereNotNull('email_subject')
            ->whereNotNull('email_body')
            ->first();

        if ($career->task_sent == 1) {
            $action = '<span class="badge badge-secondary">Task Sent</span>';
        } elseif ($career->email && $career->role && $job) {
            $action = '<form action="' . route('career.sendTask', $career->id) . '" method="POST" style="display:inline-block;">'
                    . csrf_field()
                    . '<button type="submit" class="btn btn-sm btn-success">Send Task</button>'
                    . '</form>';
        } else {
            $action = '';
        }

        // ✅ badge + dropdown with data-url
        $badge = match ($career->status) {
            'approved' => '<span class="badge badge-success">Approved</span>',
            'rejected' => '<span class="badge badge-danger">Rejected</span>',
            default     => '<span class="badge badge-warning">Pending</span>',
        };

        $statuses = ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'];
        $opts = '';
        foreach ($statuses as $val => $label) {
            $sel = $career->status === $val ? 'selected' : '';
            $opts .= "<option value=\"{$val}\" {$sel}>{$label}</option>";
        }

        // 🔗 use your route name EXACTLY as registered
        // You showed: Route::post('careers/{career}/status', ...)->name('careers.status');
        $statusUrl = route('careers.status', ['career' => $career->id]);

        $statusHtml = '<div class="d-flex flex-column gap-1">'
                    . $badge
                    . '<div class="mt-1"><select class="form-select form-select-sm career-status" '
                    . 'data-id="'.$career->id.'" data-url="'.$statusUrl.'">'.$opts.'</select></div>'
                    . '</div>';

        $data[] = [
            'name'        => $career->name,
            'contact'     => '<a href="tel:+91'.$career->phone.'">'.$career->phone.'</a><br><a href="mailto:'.$career->email.'">'.$career->email.'</a>',
            'resume'      => $career->resume_path
                                ? '<a href="'.asset('storage/'.$career->resume_path).'" target="_blank">Download Resume</a>'
                                : '<span>No Resume Uploaded</span>',
            'role'        => $career->role,
            'state'       => $career->state ?? '—',
            'experience'  => $career->experience ?? '—',
            'status'      => $statusHtml,
            'cover'       => $career->cover
                                ? '<button class="btn btn-outline-primary btn-sm view-cover" data-cover="'.e($career->cover).'">View Cover</button>'
                                : '<span>No Cover Letter</span>',
            'created_at'  => $career->created_at->format('d M Y'),
            'action'      => $action,
        ];
    }

    return response()->json([
        'draw'            => intval($request->input('draw')),
        'recordsTotal'    => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data'            => $data,
    ]);
}

        // unique roles for the dropdown
        $roles = Career::whereNotNull('role')
            ->select('role')->distinct()->orderBy('role')->pluck('role');

        return view($this->path.'index', compact('roles'));
    }

    public function filteredCareers(Request $request)
    {
        $careers = Career::whereNotNull('overall_fit')
            ->whereNotNull('justification')
            ->get(['id','name','phone','email','role','state','resume_path','overall_fit','justification','created_at']);

        return view($this->path.'filtered', compact('careers'));
    }

    /**
     * Export to XLS (respects filters)
     */
    private function exportXls($query)
    {
        ini_set('memory_limit', '1G');
        set_time_limit(0);

        $exportPath = storage_path('app/public/export');
        if (!file_exists($exportPath)) {
            mkdir($exportPath, 0775, true);
        }

        $fileName = 'careers_' . now()->format('Y-m-d-H-i-s') . '.xlsx';
        $filePath = $exportPath . '/' . $fileName;

        try {
            $writer = \Spatie\SimpleExcel\SimpleExcelWriter::create($filePath);
            $serial = 1;

            $query->orderBy('id','desc')->chunk(1000, function ($records) use ($writer, &$serial) {
                foreach ($records as $career) {
                    $writer->addRow([
                        'ID'           => $serial++,
                        'Name'         => $career->name,
                        'Email'        => $career->email,
                        'Phone'        => $career->phone,
                        'Role'         => $career->role,
                        'State'        => $career->state ?? '—',
                        'Experience'   => $career->experience ?? '—',
                        'Status'       => $career->status ?? 'pending', // NEW
                        'Resume URL'   => $career->resume_path
                                            ? asset('storage/' . ltrim($career->resume_path, '/'))
                                            : 'No Resume Uploaded',
                        'Cover Letter' => $career->cover ?? 'No Cover Letter',
                        'Submitted At' => $career->created_at->format('d-m-Y'),
                    ]);
                }
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Inline status update (AJAX)
     */
    public function updateStatus(Request $request, Career $career)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $career->status = $validated['status'];
        $career->save();

        return response()->json([
            'ok'      => true,
            'status'  => $career->status,
            'badge'   => match ($career->status) {
                'approved' => '<span class="badge badge-success">Approved</span>',
                'rejected' => '<span class="badge badge-danger">Rejected</span>',
                default     => '<span class="badge badge-warning">Pending</span>',
            },
            'message' => 'Status updated',
        ]);
    }

    public function sendTask(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        if ($career->task_sent == 1) {
            return back()->with('error', 'Task already sent!');
        }

        $job = JobListing::where('title', $career->role)->first();

        if (!$job || !$job->email_subject || !$job->email_body) {
            return back()->with('error', 'Missing job email subject or body!');
        }

        Mail::to($career->email)->send(new SendJobTask($job->email_subject, $job->email_body, 'jobs@thenightmarketer.com'));

        $career->task_sent = 1;
        $career->save();

        return back()->with('success', 'Task sent to candidate!');
    }
}
