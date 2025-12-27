<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * If unauthenticated, where should we send the user?
     */
    protected function redirectTo($request): ?string
    {
        // For API routes, do NOT redirect — let Laravel return 401 JSON
        if ($request->is('api/*') || $request->expectsJson()) {
            return null;
        }

        // For web routes, you can still redirect to login
        return route('login');
    }
}