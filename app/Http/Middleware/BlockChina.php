<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BlockChina
{
    // Block mainland China and all associated territories
    protected $blockedCountries = [
        'CN',  // China (mainland)
        'HK',  // Hong Kong
        'MO',  // Macau
        'TW',  // Taiwan (if you want to block it too)
        'LHW',  // Taiwan (if you want to block it too)
        'ZLLL',  // Taiwan (if you want to block it too)
    ];

    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        // Skip for local IPs
        if ($this->isLocalIp($ip)) {
            return $next($request);
        }

        $countryCode = $this->getCountryCode($ip);

        // Block if country is in blocked list
        if (in_array($countryCode, $this->blockedCountries)) {
            abort(403, 'Access from your location is not permitted.');
        }

        return $next($request);
    }

    private function getCountryCode($ip)
    {
        return Cache::remember("geo_ip_{$ip}", 3600, function () use ($ip) {
            try {
                $response = Http::timeout(5)->get("http://ip-api.com/json/{$ip}?fields=countryCode");

                if ($response->successful()) {
                    return $response->json()['countryCode'] ?? null;
                }
            } catch (\Exception $e) {
                // Log error if needed
            }

            return null;
        });
    }

    private function isLocalIp($ip)
    {
        $localIps = ['127.0.0.1', '::1', 'localhost'];
        return in_array($ip, $localIps) ||
            str_starts_with($ip, '192.168.') ||
            str_starts_with($ip, '10.') ||
            str_starts_with($ip, '172.16.');
    }
}
