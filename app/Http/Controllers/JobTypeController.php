<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    public function index()
    {
        $types = JobType::orderBy('id', 'desc')->paginate(20);
        return view('admin.pages.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.pages.types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:job_types,name',
            'slug' => 'nullable|string|unique:job_types,slug',
            'status' => 'required|in:1,0',
        ]);

        JobType::create($request->all());
        return redirect()->back()->with('success', 'Type created successfully!');
    }

    public function edit($id)
    {
        $type = JobType::findOrFail($id);
        return view('admin.pages.types.create', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $type = JobType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:job_types,name,' . $id,
            'slug' => 'nullable|string|unique:job_types,slug,' . $id,
            'status' => 'required|in:1,0',
        ]);

        $type->update($request->all());
        return redirect()->back()->with('success', 'Type updated successfully!');
    }
}
