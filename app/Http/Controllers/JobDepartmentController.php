<?php

namespace App\Http\Controllers;

use App\Models\JobDepartment;
use Illuminate\Http\Request;

class JobDepartmentController extends Controller
{
    public function index()
    {
        $departments = JobDepartment::orderBy('id', 'desc')->paginate(20);
        return view('admin.pages.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.pages.departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:job_departments,name',
            'slug' => 'nullable|string|unique:job_departments,slug',
            'status' => 'required|in:1,0',
        ]);

        JobDepartment::create($request->all());
        return redirect()->back()->with('success', 'Department created successfully!');
    }

    public function edit($id)
    {
        $department = JobDepartment::findOrFail($id);
        return view('admin.pages.departments.create', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = JobDepartment::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:job_departments,name,' . $id,
            'slug' => 'nullable|string|unique:job_departments,slug,' . $id,
            'status' => 'required|in:1,0',
        ]);

        $department->update($request->all());
        return redirect()->back()->with('success', 'Department updated successfully!');
    }
}
