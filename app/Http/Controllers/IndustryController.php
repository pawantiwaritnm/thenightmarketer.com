<?php 

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index(Request $request)
    {
        $industries = Industry::all();
        $industry = null;

        // Check if an edit request is made
        if ($request->has('edit')) {
            $industry = Industry::findOrFail($request->edit);
        }

        return view('admin.pages.industries.index', compact('industries', 'industry'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'industry_name' => 'required|string|max:100',
            'status' => 'required|in:0,1'
        ]);

        Industry::create($validated);

        return redirect()->route('industries.index')->with('success', 'Industry created successfully.');
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'industry_name' => 'required|string|max:100',
            'status' => 'required|in:0,1'
        ]);

        $industry->update($validated);

        return redirect()->route('industries.index')->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()->route('industries.index')->with('success', 'Industry deleted successfully.');
    }
}
