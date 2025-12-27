<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crm\Project;
use App\Models\Crm\Client;
use App\Models\Crm\Industry;
use App\Models\Crm\Technology;
use App\Models\Crm\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     */
    public function index()
    {
        $projects = Project::with(['client', 'industry', 'technology', 'addedBy'])
            ->orderBy('added_on', 'desc')
            ->get();
           
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project
     */
    public function create()
    {
        $industries = Industry::where('status', 1)->get();
        $technologies = Technology::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();

        return view('admin.projects.create', compact('industries', 'technologies', 'clients', 'users'));
    }

    /**
     * Store a newly created project
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:200',
            'project_type' => 'required',
            'starting_date' => 'required|date',
            'client_id' => 'required|exists:client_master,id',
        ]);

        try {
            DB::beginTransaction();

            $project = Project::create([
                'project_name' => $request->project_name,
                'project_type' => $request->project_type,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
                'industry_id' => $request->industry_id,
                'technology_id' => $request->technology_id,
                'hourly' => $request->hourly,
                'project_hours' => $request->project_hours,
                'client_id' => $request->client_id,
                'priority' => $request->priority,
                'project_size' => $request->project_size,
                'some_details' => $request->some_details,
                'financial_year' => 1, // Get current financial year
                'status' => 1,
                'added_on' => now(),
                'updated_on' => now(),
                'added_by' => auth()->id()
            ]);

            // Add marketers if provided
            if ($request->has('marketer_id') && is_array($request->marketer_id)) {
                foreach ($request->marketer_id as $marketerId) {
                    DB::table('add_project_marketer')->insert([
                        'project_id' => $project->id,
                        'marketer_id' => $marketerId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Project added successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add project: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified project
     */
    public function show($id)
    {
        $project = Project::with(['client', 'industry', 'technology', 'marketers', 'addedBy'])
            ->findOrFail($id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project
     */
    public function edit($id)
    {
        $project = Project::with('marketers')->findOrFail($id);
        $industries = Industry::where('status', 1)->get();
        $technologies = Technology::where('status', 1)->get();
        $clients = Client::where('status', 1)->get();
        $users = AdminUser::where('status', 1)->get();
        // dd($project);
        $marketerIds = $project->marketers->pluck('id')->toArray();

        return view('admin.projects.edit', compact('project', 'industries', 'technologies', 'clients', 'users', 'marketerIds'));
    }

    /**
     * Update the specified project
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:200',
            'project_type' => 'required',
            'starting_date' => 'required|date',
            'client_id' => 'required|exists:client_master,id',
        ]);

        try {
            DB::beginTransaction();

            $project = Project::findOrFail($id);

            $project->update([
                'project_name' => $request->project_name,
                'project_type' => $request->project_type,
                'starting_date' => $request->starting_date,
                'ending_date' => $request->ending_date,
                'industry_id' => $request->industry_id,
                'technology_id' => $request->technology_id,
                'hourly' => $request->hourly,
                'project_hours' => $request->project_hours,
                'client_id' => $request->client_id,
                'priority' => $request->priority,
                'project_size' => $request->project_size,
                'some_details' => $request->some_details,
                'updated_on' => now()
            ]);

            // Update marketers
            DB::table('add_project_marketer')->where('project_id', $id)->delete();

            if ($request->has('marketer_id') && is_array($request->marketer_id)) {
                foreach ($request->marketer_id as $marketerId) {
                    DB::table('add_project_marketer')->insert([
                        'project_id' => $project->id,
                        'marketer_id' => $marketerId
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update project: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update project priority
     */
    public function updatePriority(Request $request)
    {
        try {
            $project = Project::findOrFail($request->projectId);
            $project->assign_priority = $request->newPriority;
            $project->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Priority updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified project
     */
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->status = -1;
            $project->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Project deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update project status
     */
    public function updateStatus(Request $request)
    {
        try {
            $project = Project::findOrFail($request->id);
            $project->status = $request->status;
            $project->save();

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail'], 500);
        }
    }
}
