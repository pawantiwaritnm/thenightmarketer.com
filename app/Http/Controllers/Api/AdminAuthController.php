<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    /**
     * POST /api/admin/login
     * Body: { "email": "admin@example.com", "password": "secret" }
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'    => ['required', 'email'],
                'password' => ['required', 'string', 'min:6'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors(),
            ], 400); // Bad request instead of 422
        }

        $admin = Admin::where('email', $credentials['email'])->first();

        if (! $admin || ! \Hash::check($credentials['password'], $admin->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password',
            ], 401); // Unauthorized
        }

        // Optional: block inactive admins
        if (isset($admin->status) && (string) $admin->status !== '1') {
            return response()->json([
                'success' => false,
                'message' => 'Admin is inactive.',
            ], 403); // Forbidden
        }

        // Create token
        $token = $admin->createToken('admin-api', ['admin:read', 'admin:write'])->plainTextToken;

        return response()->json([
            'success'    => true,
            'token'      => $token,
            'token_type' => 'Bearer',
            'user'       => [
                'id'    => $admin->id,
                'name'  => $admin->name,
                'email' => $admin->email,
                'role'  => $admin->role,
                'pic'   => $admin->pic,
                'bio'   => $admin->bio,
            ],
        ]);
    }


    /**
     * POST /api/admin/logout (auth required)
     * Revokes current token.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out.',
        ]);
    }

    /**
     * GET /api/admin/me (auth required)
     * Returns current admin.
     */
    public function me(Request $request)
    {
        $admin = $request->user(); // This will be the Admin model instance
        return response()->json([
            'success' => true,
            'user'   => [
                'id'    => $admin->id,
                'name'  => $admin->name,
                'email' => $admin->email,
                'role'  => $admin->role,
                'pic'   => $admin->pic,
                'bio'   => $admin->bio,
            ],
        ]);
    }
}
