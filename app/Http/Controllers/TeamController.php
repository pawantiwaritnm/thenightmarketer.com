<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the team members.
     */
    public function index(Request $request)
    {
        $query = Team::query();
    
        if ($request->filled('designation')) {
            $query->where('designation', $request->designation);
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status == 'active' ? 1 : 0);
        }
    
        $teams = $query->get();
        $designations = Team::select('designation')->distinct()->pluck('designation');
    
        if ($request->ajax()) {
            return view('admin.pages.partials.team-list', compact('teams'));
        }
    
        return view('admin.pages.team.index', compact('teams', 'designations'));
    }
    
    /**
     * Show the form for creating a new team member.
     */
    public function create()
    {
        return view('admin.pages.team.create');
    }

    /**
     * Store a newly created team member in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);
    
        // Handle the image upload
        $path = $request->file('image')->store('team_images', 'public');
    
        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'image' => $path,
            'status' => $request->status,
        ]);
    
        return redirect()->route('team.index')->with('success', 'Team member added successfully.');
    }
    /**
     * Show the form for editing a team member.
     */
    public function edit($id)
    {
        $teamMember = Team::findOrFail($id);
        return view('admin.pages.team.edit', compact('teamMember'));
    }

    /**
     * Update the specified team member in storage.
     */
    public function update(Request $request, $id)
    {
        $teamMember = Team::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);
    
        if ($request->hasFile('image')) {
            if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $path = $request->file('image')->store('team_images', 'public');
            $teamMember->image = $path;
        }
    
        $teamMember->update($request->only(['name', 'designation', 'description', 'status']));
    
        return redirect()->route('team.index')->with('success', 'Team member updated successfully.');
    }
    

    /**
     * Toggle the status of a team member.
     */
    public function toggleStatus($id)
    {
        try {
            $teamMember = Team::findOrFail($id);
            $teamMember->status = !$teamMember->status; // Toggle between 1 and 0
            $teamMember->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'status' => $teamMember->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status'
            ], 500);
        }
    }

    /**
     * Remove the specified team member from storage.
     */
    public function destroy($id)
    {
        $teamMember = Team::findOrFail($id);

        // Delete the image from storage if it exists
        if ($teamMember->image && Storage::disk('public')->exists($teamMember->image)) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('team.index')->with('success', 'Team member deleted successfully.');
    }
}
