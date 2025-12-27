<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Meeting;
use App\Models\Crm\Project;
use App\Models\Crm\Client;
use App\Models\Crm\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeetingController extends Controller
{
    /**
     * Display a listing of meetings
     */
    public function index()
    {
        $meetings = Meeting::with(['project', 'addedBy'])
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.meetings.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new meeting
     */
    public function create()
    {
        $projects = Project::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();
                $users = AdminUser::where('status', 1)->get();

        return view('admin.meetings.create', compact('projects','clients','users'));
    }

    /**
     * Store a newly created meeting
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:add_projects,id',
            'agenda' => 'required|string',
            'date' => 'required|date',
        ]);

        try {
            $uploadedFile = '';

            if ($request->hasFile('upload_file')) {
                $file = $request->file('upload_file');
                $uploadedFile = $file->store('meetings', 'public');
            }

            Meeting::create([
                'project_id' => $request->project_id,
                'agenda' => $request->agenda,
                'date' => $request->date,
                'link' => $request->link,
                'upload_file' => $uploadedFile,
                'status' => 1,
                'added_on' => now(),
                'added_by' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Meeting added successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Meeting: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified meeting
     */
    public function show($id)
    {
        $meeting = Meeting::with(['project', 'addedBy'])->findOrFail($id);
        return view('admin.meetings.show', compact('meeting'));
    }

    /**
     * Show the form for editing the specified meeting
     */
    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);
        $projects = Project::where('status', 1)->get();

        return view('admin.meetings.edit', compact('meeting', 'projects'));
    }

    /**
     * Update the specified meeting
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_id' => 'required|exists:add_projects,id',
            'agenda' => 'required|string',
            'date' => 'required|date',
        ]);

        try {
            $meeting = Meeting::findOrFail($id);

            $uploadedFile = $meeting->upload_file;

            if ($request->hasFile('upload_file')) {
                // Delete old file
                if ($uploadedFile) {
                    Storage::disk('public')->delete($uploadedFile);
                }
                $file = $request->file('upload_file');
                $uploadedFile = $file->store('meetings', 'public');
            }

            $meeting->update([
                'project_id' => $request->project_id,
                'agenda' => $request->agenda,
                'date' => $request->date,
                'link' => $request->link,
                'upload_file' => $uploadedFile
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Meeting updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Meeting: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified meeting
     */
    public function destroy($id)
    {
        try {
            $meeting = Meeting::findOrFail($id);
            $meeting->status = -1;
            $meeting->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Meeting deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update meeting status
     */
    public function updateStatus(Request $request)
    {
        try {
            $meeting = Meeting::findOrFail($request->id);
            $meeting->status = $request->status;
            $meeting->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
