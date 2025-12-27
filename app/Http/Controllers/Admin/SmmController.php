<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Smm;
use App\Models\Crm\Client;
use App\Models\Crm\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmmController extends Controller
{
    /**
     * Display a listing of SMM projects
     */
    public function index()
    {
        $smms = Smm::with(['client', 'assignedUsers', 'addedBy'])
            ->orderBy('added_on', 'desc')
            ->get();

        return view('admin.smm.index', compact('smms'));
    }

    /**
     * Show the form for creating a new SMM project
     */
    public function create()
    {
        $clients = Client::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();

        return view('admin.smm.create', compact('clients', 'users'));
    }

    /**
     * Store a newly created SMM project
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:client_master,id',
            'starting_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $smm = Smm::create([
                'client_id' => $request->client_id,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
                'duration' => $request->duration,
                'sheet_link' => $request->sheet_link,
                'type_of_plan' => $request->type_of_plan,
                'social_media' => $request->social_media,
                'financial_year' => 1,
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            // Add assigned users
            if ($request->has('assign_to') && is_array($request->assign_to)) {
                foreach ($request->assign_to as $userId) {
                    DB::table('smm_assign_to')->insert([
                        'smm_id' => $smm->id,
                        'assign_to' => $userId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'SMM added successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add SMM: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified SMM project
     */
    public function show($id)
    {
        $smm = Smm::with(['client', 'assignedUsers', 'addedBy'])->findOrFail($id);
        return view('admin.smm.show', compact('smm'));
    }

    /**
     * Show the form for editing the specified SMM project
     */
    public function edit($id)
    {
        $smm = Smm::with('assignedUsers')->findOrFail($id);
        $clients = Client::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();
        $assignedUserIds = $smm->assignedUsers->pluck('id')->toArray();

        return view('admin.smm.edit', compact('smm', 'clients', 'users', 'assignedUserIds'));
    }

    /**
     * Update the specified SMM project
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:client_master,id',
            'starting_date' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $smm = Smm::findOrFail($id);

            $smm->update([
                'client_id' => $request->client_id,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
                'duration' => $request->duration,
                'sheet_link' => $request->sheet_link,
                'type_of_plan' => $request->type_of_plan,
                'social_media' => $request->social_media,
                'updated_on' => now()
            ]);

            // Update assigned users
            DB::table('smm_assign_to')->where('smm_id', $id)->delete();

            if ($request->has('assign_to') && is_array($request->assign_to)) {
                foreach ($request->assign_to as $userId) {
                    DB::table('smm_assign_to')->insert([
                        'smm_id' => $smm->id,
                        'assign_to' => $userId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'SMM updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update SMM: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified SMM project
     */
    public function destroy($id)
    {
        try {
            $smm = Smm::findOrFail($id);
            $smm->status = -1;
            $smm->save();

            return response()->json([
                'status' => 'success',
                'message' => 'SMM deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update SMM status
     */
    public function updateStatus(Request $request)
    {
        try {
            $smm = Smm::findOrFail($request->id);
            $smm->status = $request->status;
            $smm->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
