<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{ 

    public function handle($request, Closure $next)
    {  die();
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login page or return error
            return redirect()->route('admin-login');
        }

        return $next($request);
    }
}

