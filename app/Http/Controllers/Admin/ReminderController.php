<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Reminder;
use App\Models\Crm\Client;
use App\Models\Crm\Project;
use App\Models\Crm\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReminderController extends Controller
{
    /**
     * Display a listing of reminders
     */
    public function index()
    {
        $reminders = Reminder::with(['client', 'project', 'users', 'addedBy'])
            ->orderBy('reminder_date', 'desc')
            ->get();

        return view('admin.reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new reminder
     */
    public function create()
    {
        $clients = Client::where('status', 1)->get();
        $projects = Project::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();

        return view('admin.reminders.create', compact('clients', 'projects', 'users'));
    }

    /**
     * Store a newly created reminder
     */
    public function store(Request $request)
    {
        $request->validate([
            'reminder_name' => 'required|string|max:200',
            'reminder_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $reminder = Reminder::create([
                'reminder_name' => $request->reminder_name,
                'description' => $request->description,
                'reminder_client' => $request->reminder_client,
                'reminder_project' => $request->reminder_project,
                'reminder_date' => $request->reminder_date,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            // Add assigned users
            if ($request->has('user_id') && is_array($request->user_id)) {
                foreach ($request->user_id as $userId) {
                    DB::table('add_reminders_user')->insert([
                        'reminders_id' => $reminder->id,
                        'user_id' => $userId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Reminder added successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Reminder: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified reminder
     */
    public function show($id)
    {
        $reminder = Reminder::with(['client', 'project', 'users', 'addedBy'])->findOrFail($id);
        return view('admin.reminders.show', compact('reminder'));
    }

    /**
     * Show the form for editing the specified reminder
     */
    public function edit($id)
    {
        $reminder = Reminder::with('users')->findOrFail($id);
        $clients = Client::where('status', 1)->get();
        $projects = Project::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();
        $userIds = $reminder->users->pluck('id')->toArray();

        return view('admin.reminders.edit', compact('reminder', 'clients', 'projects', 'users', 'userIds'));
    }

    /**
     * Update the specified reminder
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reminder_name' => 'required|string|max:200',
            'reminder_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $reminder = Reminder::findOrFail($id);

            $reminder->update([
                'reminder_name' => $request->reminder_name,
                'description' => $request->description,
                'reminder_client' => $request->reminder_client,
                'reminder_project' => $request->reminder_project,
                'reminder_date' => $request->reminder_date,
                'updated_on' => now()
            ]);

            // Update assigned users
            DB::table('add_reminders_user')->where('reminders_id', $id)->delete();

            if ($request->has('user_id') && is_array($request->user_id)) {
                foreach ($request->user_id as $userId) {
                    DB::table('add_reminders_user')->insert([
                        'reminders_id' => $reminder->id,
                        'user_id' => $userId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Reminder updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Reminder: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified reminder
     */
    public function destroy($id)
    {
        try {
            $reminder = Reminder::findOrFail($id);
            $reminder->status = -1;
            $reminder->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Reminder deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update reminder status
     */
    public function updateStatus(Request $request)
    {
        try {
            $reminder = Reminder::findOrFail($request->id);
            $reminder->status = $request->status;
            $reminder->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
