<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotFound
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // ✅ Skip middleware logic for admin routes
        if ($request->is('admin/*')) {
            return $response;
        }

        // ✅ Safely check if response supports getStatusCode
        if (method_exists($response, 'getStatusCode') && $response->getStatusCode() == 404) {
            return redirect('https://thenightmarketer.com/');
        }

        return $response;
    }
}
