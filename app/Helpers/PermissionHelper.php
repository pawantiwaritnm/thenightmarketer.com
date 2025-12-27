<?php

if (!function_exists('can_access')) {
    /**
     * Check if the current admin user can access a module with a specific action
     *
     * @param string $module Module name
     * @param string $action Action name (view, add, edit, delete, export)
     * @return bool
     */
    function can_access(string $module, string $action = 'view'): bool
    {
        $user = auth()->guard('admin')->user();

        if (!$user) {
            return false;
        }

        // Super Admin has all permissions
        if ($user->adminRole && $user->adminRole->name === 'Super Admin') {
            return true;
        }

        // Check if user has the required permission
        return $user->adminRole && $user->adminRole->hasPermission($module, $action);
    }
}

if (!function_exists('has_role')) {
    /**
     * Check if the current admin user has a specific role
     *
     * @param string $roleName Role name
     * @return bool
     */
    function has_role(string $roleName): bool
    {
        $user = auth()->guard('admin')->user();

        if (!$user || !$user->adminRole) {
            return false;
        }

        return $user->adminRole->name === $roleName;
    }
}

if (!function_exists('is_super_admin')) {
    /**
     * Check if the current admin user is a Super Admin
     *
     * @return bool
     */
    function is_super_admin(): bool
    {
        return has_role('Super Admin');
    }
}
