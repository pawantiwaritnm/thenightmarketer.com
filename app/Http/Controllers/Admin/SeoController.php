<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Seo;
use App\Models\Crm\Client;
use App\Models\Crm\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    /**
     * Display a listing of SEO projects
     */
    public function index()
    {
        $seos = Seo::with(['client', 'assignedUsers', 'addedBy'])
            ->orderBy('added_on', 'desc')
            ->get();

        return view('admin.seo.index', compact('seos'));
    }

    /**
     * Show the form for creating a new SEO project
     */
    public function create()
    {
        $clients = Client::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();

        return view('admin.seo.create', compact('clients', 'users'));
    }

    /**
     * Store a newly created SEO project
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:client_master,id',
            'starting_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $seo = Seo::create([
                'client_id' => $request->client_id,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
                'duration' => $request->duration,
                'sheet_link' => $request->sheet_link,
                'type_of_plan' => $request->type_of_plan,
                'financial_year' => 1,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            // Add assigned users
            if ($request->has('assign_to') && is_array($request->assign_to)) {
                foreach ($request->assign_to as $userId) {
                    DB::table('seo_assign_to')->insert([
                        'seo_id' => $seo->id,
                        'assign_to' => $userId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'SEO added successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add SEO: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified SEO project
     */
    public function show($id)
    {
        $seo = Seo::with(['client', 'assignedUsers', 'addedBy'])->findOrFail($id);
        return view('admin.seo.show', compact('seo'));
    }

    /**
     * Show the form for editing the specified SEO project
     */
    public function edit($id)
    {
        $seo = Seo::with('assignedUsers')->findOrFail($id);
        $clients = Client::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();
        $assignedUserIds = $seo->assignedUsers->pluck('id')->toArray();

        return view('admin.seo.edit', compact('seo', 'clients', 'users', 'assignedUserIds'));
    }

    /**
     * Update the specified SEO project
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:client_master,id',
            'starting_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $seo = Seo::findOrFail($id);

            $seo->update([
                'client_id' => $request->client_id,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
                'duration' => $request->duration,
                'sheet_link' => $request->sheet_link,
                'type_of_plan' => $request->type_of_plan,
                'updated_on' => now()
            ]);

            // Update assigned users
            DB::table('seo_assign_to')->where('seo_id', $id)->delete();

            if ($request->has('assign_to') && is_array($request->assign_to)) {
                foreach ($request->assign_to as $userId) {
                    DB::table('seo_assign_to')->insert([
                        'seo_id' => $seo->id,
                        'assign_to' => $userId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'SEO updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update SEO: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified SEO project
     */
    public function destroy($id)
    {
        try {
            $seo = Seo::findOrFail($id);
            $seo->status = -1;
            $seo->save();

            return response()->json([
                'status' => 'success',
                'message' => 'SEO deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update SEO status
     */
    public function updateStatus(Request $request)
    {
        try {
            $seo = Seo::findOrFail($request->id);
            $seo->status = $request->status;
            $seo->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
