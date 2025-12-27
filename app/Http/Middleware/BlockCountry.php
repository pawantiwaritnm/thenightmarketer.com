<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockCountry
{
    protected $blockedCountries = ['CN']; // China's ISO code

    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $countryCode = $this->getCountryFromIP($ip);

        if (in_array($countryCode, $this->blockedCountries)) {
            abort(403, 'Access denied from your location.');
        }

        return $next($request);
    }

    private function getCountryFromIP($ip)
    {
        // Using a free GeoIP service
        try {
            $response = file_get_contents("http://ip-api.com/json/{$ip}");
            $data = json_decode($response);
            return $data->countryCode ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
}