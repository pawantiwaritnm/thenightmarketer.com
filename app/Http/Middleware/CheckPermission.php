<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $module  Module name (e.g., 'Blogs', 'Users')
     * @param  string  $action  Action name (view, add, edit, delete, export)
     */
    public function handle(Request $request, Closure $next, string $module, string $action = 'view'): Response
    {
        $user = auth()->guard('admin')->user();

        // If no user is authenticated, redirect to login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to continue');
        }

        // Super Admin has all permissions
        if ($user->adminRole && $user->adminRole->name === 'Super Admin') {
            return $next($request);
        }

        // Check if user has the required permission
        if (!$user->adminRole || !$user->adminRole->hasPermission($module, $action)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'You do not have permission to ' . $action . ' ' . $module
                ], 403);
            }

            return redirect()->back()->with('error', 'You do not have permission to access this resource.');
        }

        return $next($request);
    }
}
