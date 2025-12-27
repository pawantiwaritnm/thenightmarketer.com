<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\JobType;
use App\Models\JobDepartment;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    // List all job listings
    public function index()
    {
        $jobs = JobListing::orderBy('sort_order', 'asc')->paginate(20);
        return view('admin.pages.job_listings.index', compact('jobs'));
    }
    public function create()
    {
        $departments = JobDepartment::where('status', 1)->get();
        $types = JobType::where('status', 1)->get();
        return view('admin.pages.job_listings.create', compact('departments', 'types'));
    }

    // Store a new job listing
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'department_id' => 'nullable|exists:job_departments,id',
            'location' => 'nullable|string',
            'type_id' => 'nullable|exists:job_types,id',
            'skills_req' => 'nullable|string',
            'short_desc' => 'nullable|string',
            'minimum_exp' => 'nullable|string',
            'long_desc' => 'nullable|string',
            'status' => 'required|in:1,0',
            'sort_order' => 'nullable|integer',
            'email_subject' => 'nullable|string',
            'email_body' => 'nullable|string',
        ]);

        JobListing::create($validated);
        return redirect()->back()->with('success', 'Job listing created successfully!');
    }

    // Edit job listing (return data)
    public function edit($id)
    {
        $job = JobListing::findOrFail($id);
        $departments = JobDepartment::where('status', 1)->get();
        $types = JobType::where('status', 1)->get();
        return view('admin.pages.job_listings.create', compact('job', 'departments', 'types'));
    }

    // Update a job listing
    public function update(Request $request, $id)
    {
        $job = JobListing::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'department_id' => 'nullable|exists:job_departments,id',
            'location' => 'nullable|string',
            'type_id' => 'nullable|exists:job_types,id',
            'skills_req' => 'nullable|string',
            'short_desc' => 'nullable|string',
            'minimum_exp' => 'nullable|string',
            'long_desc' => 'nullable|string',
            'status' => 'required|in:1,0',
            'sort_order' => 'nullable|integer',
            'email_subject' => 'nullable|string',
            'email_body' => 'nullable|string',
        ]);

        $job->update($validated);
        return redirect()->back()->with('success', 'Job listing updated successfully!');
    }

    // Update status via AJAX or toggle
    public function updateStatus(Request $request, $id)
    {
        $job = JobListing::findOrFail($id);

        $request->validate([
            'status' => 'required|in:1,0',
        ]);

        $job->status = $request->status;
        $job->save();

        return response()->json(['success' => true, 'message' => 'Status updated']);
    }
}
