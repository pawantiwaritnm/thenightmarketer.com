<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SecurePdfAccess
{
    /**
     * Handle an incoming request for secure PDF access
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verify user is authenticated
        if (!$request->user()) {
            Log::warning('Unauthorized PDF access attempt', [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'user_agent' => $request->userAgent()
            ]);
            
            abort(403, 'Authentication required');
        }

        // Verify request is from same origin (prevent hotlinking)
        $referer = $request->header('referer');
        $appUrl = config('app.url');
        
        if ($referer && !str_starts_with($referer, $appUrl)) {
            Log::warning('Cross-origin PDF access attempt', [
                'user_id' => $request->user()->id,
                'referer' => $referer,
                'ip' => $request->ip()
            ]);
            
            abort(403, 'Invalid request origin');
        }

        // Check for suspicious user agents (bots, scrapers)
        $userAgent = strtolower($request->userAgent() ?? '');
        $suspiciousAgents = ['bot', 'crawler', 'spider', 'scraper', 'wget', 'curl'];
        
        foreach ($suspiciousAgents as $agent) {
            if (str_contains($userAgent, $agent)) {
                Log::warning('Suspicious user agent detected', [
                    'user_id' => $request->user()->id,
                    'user_agent' => $userAgent,
                    'ip' => $request->ip()
                ]);
                
                // You can choose to block or just log
                // abort(403, 'Access denied');
            }
        }

        // Verify CSRF token for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            if (!$request->hasHeader('X-CSRF-TOKEN')) {
                abort(403, 'CSRF token missing');
            }
        }

        $response = $next($request);

        // Add additional security headers to response
        $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        $response->headers->set('Referrer-Policy', 'no-referrer');
        
        return $response;
    }
}