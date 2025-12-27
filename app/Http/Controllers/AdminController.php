<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public $path = "admin.pages.admin.";
    public $route = "admin.";
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //getting query parameters from request
        $query = $request->input('query');
        //getting admins where query matches name or email - newest first
        $admins = Admin::with('adminRole')
            ->when($query, fn ($Query, $query) => $Query->search($query))
            ->orderBy('id', 'DESC')
            ->get();
        return view($this->path . "index", compact('admins'));
    }

    public function updateUserStatus($id, Request $request)
    {
        $user = Admin::find($id);
    
        if (!$user) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    
        $user->status = $request->input('status');
        $user->save();
    
        return response()->json(['message' => 'Service status updated successfully']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = \App\Models\Role::where('status', 1)->get();
        return view($this->path . "create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        // Validating and inserting data
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $validated['status'] = 1;
        
        // Check if a file was uploaded
        if ($request->hasFile('pic')) { 
            // Try to upload the image
            $path = $request->file('pic')->store('public/admins');
            // Check if the image was successfully uploaded
            if ($path) {
                $explodedPath = explode('/', $path);
                
                // Check if the exploded path has at least 3 elements
                if (count($explodedPath) >= 3) {
                    $validated['pic'] = $explodedPath[2];
                } else {
                    // Log an error if the exploded path doesn't have enough elements
                    
                    // Handle the error or provide feedback to the user
                }
            } else {
                // Log an error if the image upload fails
                
                // Handle the error or provide feedback to the user
            }
        }
        
        // Storing admin data
        Admin::create($validated);
        
        // Redirecting to index page
        return redirect()
            ->route("user-list")
            ->with(['status' => 'Success', 'msg' => "{$validated['role']} user created successfully"]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::find($id);
        $roles = \App\Models\Role::where('status', 1)->get();
        return view($this->path . "create", [
            'admin' => $admin,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, $id)
    {  
        $Admin = Admin::find($id);

        //validating and inserting data
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        //upload pic if user has uploaded a new pic
        if ($request->hasFile('pic'))
            //get uploaded file name without folder name
            $validated['pic'] = explode('/', $request->file('pic')->store('public/admins'))[2];
        // $validated['pic'] = $request->file('pic')->store('public/admins');
        //updating admin data
        $Admin->update($validated);
        //redirecting to index page
        return redirect()
            ->route("user-list")
            ->with(['status' => 'Success', 'msg' => "{$Admin->role} user updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $Admin)
    {
        //deleting admin
        $Admin->delete();
        //redirecting to index page
        return redirect()
            ->route($this->route . "index")
            ->with(['status' => 'Success', 'msg' => "{$Admin->role} user deleted successfully"]);
    }

    /**
     * Reset admin password
     */
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->password = bcrypt($request->new_password);
        $admin->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password reset successfully'
        ]);
    }
}
