<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ClientAuthController extends Controller
{
    /**
     * POST /api/client/login
     * Body: { "email": "...", "password": "..." }
     */
 private function normalizeStatus($val): string
{
    $s = strtolower(trim((string) $val));
    if ($s === '1' || $s === 'true' || $s === 'active')   return 'active';
    if ($s === '0' || $s === 'false' || $s === 'inactive') return 'inactive';
    // default to inactive if unknown/empty
    return $s ?: 'inactive';
}

public function login(Request $request)
{
    try {
        $data = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string','min:6'],
        ], [
            'email.required'    => 'Please enter your email.',
            'email.email'       => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min'      => 'Password must be at least :min characters.',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors'  => $e->errors(),
        ], 400);
    }

    // Force-cast status to string at query time (defensive)
    $client = \App\Models\ClientMaster::withCasts(['status' => 'string'])
        ->where('email', $data['email'])
        ->first();

    if (! $client || ! \Hash::check($data['password'], $client->password)) {
        return response()->json(['success' => false, 'message' => 'Invalid email or password.'], 401);
    }

    // Accept both 'active' and legacy 1/0 values
    if ($this->normalizeStatus($client->status) !== 'active') {
        return response()->json(['success' => false, 'message' => 'Account is inactive.'], 403);
    }

    $token = $client->createToken('client-api', ['client'])->plainTextToken;

    return response()->json([
        'success'    => true,
        'token'      => $token,
        'token_type' => 'Bearer',
        'user'       => [
            'client_id'   => $client->client_id,
            'client_name' => $client->client_name,
            'email'       => $client->email,
            'contact'     => $client->contact_email,
            'status'      => $this->normalizeStatus($client->status), // normalized string
            'total_spend' => $client->total_spend,
            'role'        => $client->role,
        ],
    ], 200);
}

public function me(Request $request)
{
    /** @var \App\Models\ClientMaster $client */
    $client = $request->user();

    return response()->json([
        'success' => true,
        'user' => [
            'client_id'   => $client->client_id,
            'client_name' => $client->client_name,
            'email'       => $client->email,
            'contact'     => $client->contact_email,
            'status'      => $this->normalizeStatus($client->status), // 👈 not int compare
            'total_spend' => $client->total_spend,
        ],
    ]);
}

    /**
     * POST /api/client/logout (auth required)
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out.',
        ]);
    }
}
