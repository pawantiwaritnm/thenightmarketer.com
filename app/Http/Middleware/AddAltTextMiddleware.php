<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddAltTextMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response->isSuccessful() && $response->headers->get('Content-Type') === 'text/html') {
            $content = $response->getContent();

            $content = preg_replace_callback(
                '/<img[^>]*src=["\']([^"\']+)["\'][^>]*>/i',
                function ($matches) {
                    $src = $matches[1];
                    $alt = ucfirst(str_replace(['-', '_'], ' ', pathinfo($src, PATHINFO_FILENAME)));

                    if (!preg_match('/alt=["\'].*?["\']/', $matches[0])) {
                        return preg_replace('/<img/', '<img alt="' . $alt . '"', $matches[0], 1);
                    }

                    return $matches[0];
                },
                $content
            );

            $response->setContent($content);
        }

        return $response;
    }
}
