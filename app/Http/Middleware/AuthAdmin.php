<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    public function handle($request, Closure $next, $guard = 'admin')
    {
        //prd(Auth::guard($guard)->check());
        if (! Auth::guard($guard)->check()) {
            return redirect('admin/login');
        }
        Auth::shouldUse('admin');

        return $next($request);
    }
}