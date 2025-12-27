<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomCors
{
    /**
     * Handle an incoming request and add CORS headers.
     *
     * Reads allowed origins from env('FRONTEND_ORIGINS') as a comma-separated list.
     * Toggle credentials behavior with env('FRONTEND_ALLOW_CREDENTIALS', false).
     */
    public function handle(Request $request, Closure $next)
    {
        // Read allowed origins from env and trim spaces
        $raw = env('FRONTEND_ORIGINS', '');
        $allowedOrigins = array_filter(array_map('trim', explode(',', $raw)));

        // Whether to allow credentials (cookies/auth)
        $allowCredentials = filter_var(env('FRONTEND_ALLOW_CREDENTIALS', false), FILTER_VALIDATE_BOOLEAN);

        // Origin of current request
        $origin = $request->headers->get('Origin');

        // Determine which origin to return (must be exact if credentials true)
        $allowedOriginToReturn = null;
        if ($origin && in_array($origin, $allowedOrigins, true)) {
            $allowedOriginToReturn = $origin;
        } elseif (empty($allowedOrigins)) {
            // If no origin configured, allow all (not recommended in prod)
            $allowedOriginToReturn = '*';
        }

        // If preflight OPTIONS request, return early (with headers added below)
        if ($request->getMethod() === 'OPTIONS') {
            $response = response('', 204);
        } else {
            $response = $next($request);
        }

        // Set Access-Control-Allow-Origin — if credentials are allowed, must return exact origin
        if ($allowCredentials) {
            // When credentials=true, we must not use '*' — return exact origin or nothing
            if ($allowedOriginToReturn && $allowedOriginToReturn !== '*') {
                $response->headers->set('Access-Control-Allow-Origin', $allowedOriginToReturn);
                $response->headers->set('Vary', 'Origin'); // helps caches differentiate by Origin
            } else {
                // No matching origin found — do not set CORS (preflight should fail in browser)
            }
        } else {
            // No credentials required — allow wildcard if configured
            $response->headers->set('Access-Control-Allow-Origin', $allowedOriginToReturn ?? '*');
            if ($allowedOriginToReturn && $allowedOriginToReturn !== '*') {
                $response->headers->set('Vary', 'Origin');
            }
        }

        // Common CORS headers
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
        // List headers you expect from the client (Authorization is common)
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept, Origin');
        $response->headers->set('Access-Control-Max-Age', '86400'); // 24 hours

        if ($allowCredentials) {
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
        }

        return $response;
    }
}
