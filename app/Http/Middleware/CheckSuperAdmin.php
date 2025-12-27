<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->guard('admin')->user();

        // If no user is authenticated, redirect to login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to continue');
        }

        // Check if user is Super Admin
        if (!$user->adminRole || $user->adminRole->name !== 'Super Admin') {
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Access denied. Super Admin only.'
                ], 403);
            }

            return redirect()->route('admin.dashboard')->with('error', 'Access denied. This area is restricted to Super Admins only.');
        }

        return $next($request);
    }
}
