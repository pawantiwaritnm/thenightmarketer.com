<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy('module');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'permissions' => 'required|array|min:1',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        // Attach permissions with individual actions
        $permissionsData = [];
        foreach ($request->permissions as $permissionId => $actions) {
            if (is_array($actions) && (
                !empty($actions['view']) ||
                !empty($actions['add']) ||
                !empty($actions['edit']) ||
                !empty($actions['delete']) ||
                !empty($actions['export'])
            )) {
                $permissionsData[$permissionId] = [
                    'can_view' => !empty($actions['view']) ? 1 : 0,
                    'can_add' => !empty($actions['add']) ? 1 : 0,
                    'can_edit' => !empty($actions['edit']) ? 1 : 0,
                    'can_delete' => !empty($actions['delete']) ? 1 : 0,
                    'can_export' => !empty($actions['export']) ? 1 : 0,
                ];
            }
        }

        if (empty($permissionsData)) {
            return redirect()->back()->withInput()
                ->with('error', 'Please select at least one permission with at least one action.');
        }

        $role->permissions()->attach($permissionsData);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified role.
     */
    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        // Prevent editing Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Super Admin role cannot be modified');
        }

        $permissions = Permission::all()->groupBy('module');

        // Get role permissions with their individual actions
        $rolePermissions = [];
        foreach ($role->permissions as $permission) {
            $rolePermissions[$permission->id] = [
                'view' => $permission->pivot->can_view,
                'add' => $permission->pivot->can_add,
                'edit' => $permission->pivot->can_edit,
                'delete' => $permission->pivot->can_delete,
                'export' => $permission->pivot->can_export,
            ];
        }

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        // Prevent updating Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Super Admin role cannot be modified');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'permissions' => 'required|array|min:1',
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        // Sync permissions with individual actions
        $permissionsData = [];
        foreach ($request->permissions as $permissionId => $actions) {
            if (is_array($actions) && (
                !empty($actions['view']) ||
                !empty($actions['add']) ||
                !empty($actions['edit']) ||
                !empty($actions['delete']) ||
                !empty($actions['export'])
            )) {
                $permissionsData[$permissionId] = [
                    'can_view' => !empty($actions['view']) ? 1 : 0,
                    'can_add' => !empty($actions['add']) ? 1 : 0,
                    'can_edit' => !empty($actions['edit']) ? 1 : 0,
                    'can_delete' => !empty($actions['delete']) ? 1 : 0,
                    'can_export' => !empty($actions['export']) ? 1 : 0,
                ];
            }
        }

        if (empty($permissionsData)) {
            return redirect()->back()->withInput()
                ->with('error', 'Please select at least one permission with at least one action.');
        }

        $role->permissions()->sync($permissionsData);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // Prevent deleting Super Admin and Admin roles
        if ($role->name === 'Super Admin' || $role->name === 'Admin') {
            return response()->json([
                'status' => 'error',
                'message' => 'Cannot delete the ' . $role->name . ' role'
            ], 403);
        }

        $role->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Role deleted successfully'
        ]);
    }

    /**
     * Toggle role status
     */
    public function toggleStatus($id)
    {
        $role = Role::findOrFail($id);
        $role->status = !$role->status;
        $role->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Role status updated successfully'
        ]);
    }
}
