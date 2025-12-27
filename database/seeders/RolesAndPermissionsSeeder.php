<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define all modules in the system
        $modules = [
            'Dashboard',
            'Blogs',
            'Blog Categories',
            'Services',
            'Service Categories',
            'Case Studies',
            'Industries',
            'Clients',
            'Team',
            'Categories',
            'Page Meta',
            'Due Dates',
            'Contacts',
            'Careers',
            'Users',
            'Testimonials',
            'Payments',
            'Job Listings',
            'Job Departments',
            'Job Types',
            'Projects',
            'Notes',
            'CRM Clients',
            'Reminders',
            'Portfolios',
            'Meetings',
            'SEO',
            'SMM',
            'Assets',
            'Roles',
            'Permissions'
        ];

        // Create permissions for each module
        foreach ($modules as $module) {
            Permission::create([
                'name' => $module,
                'module' => $module,
                'can_view' => 1,
                'can_add' => 1,
                'can_edit' => 1,
                'can_delete' => 1,
                'can_export' => 1,
            ]);
        }

        // Create Super Admin role with all permissions (cannot be modified)
        $superAdminRole = Role::create([
            'name' => 'Super Admin',
            'description' => 'Super Administrator with full access to all modules. This role cannot be modified or deleted.',
            'status' => 1
        ]);
        $superAdminRole->permissions()->attach(Permission::all());

        // Create Admin role with all permissions
        $adminRole = Role::create([
            'name' => 'Admin',
            'description' => 'Administrator with full access to all modules',
            'status' => 1
        ]);
        $adminRole->permissions()->attach(Permission::all());

        // Create Manager role with limited permissions
        $managerRole = Role::create([
            'name' => 'Manager',
            'description' => 'Manager with access to most modules except system settings',
            'status' => 1
        ]);
        $managerPermissions = Permission::whereNotIn('module', ['Roles', 'Permissions', 'Users'])
            ->get();
        $managerRole->permissions()->attach($managerPermissions);

        // Create Editor role with content management permissions
        $editorRole = Role::create([
            'name' => 'Editor',
            'description' => 'Editor with access to content modules only',
            'status' => 1
        ]);
        $editorPermissions = Permission::whereIn('module', [
            'Blogs',
            'Blog Categories',
            'Services',
            'Service Categories',
            'Case Studies',
            'Page Meta'
        ])->get();
        $editorRole->permissions()->attach($editorPermissions);

        // Create Viewer role with read-only access
        $viewerRole = Role::create([
            'name' => 'Viewer',
            'description' => 'Viewer with read-only access to all modules',
            'status' => 1
        ]);
        $allPermissions = Permission::all();
        foreach ($allPermissions as $permission) {
            $viewerRole->permissions()->attach($permission->id);
        }
    }
}
