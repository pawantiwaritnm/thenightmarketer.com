<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataRecordResource;
use App\Models\ClientMaster;
use App\Models\DataRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Uniform JSON error helper.
     */
    private function error(string $message, int $status = 400, array $extra = [])
    {
        return response()->json(array_merge([
            'success' => false,
            'message' => $message,
        ], $extra), $status);
    }

    /**
     * Figure out identity/role safely.
     * Returns array: [ok, isAdmin, ownClientId, reason]
     * - ok=false & reason='missing_token' if no Authorization header provided
     * - ok=false & reason='invalid_token' if header present but user() is null
     */
    private function who(Request $request): array
    {
        $bearer = $request->bearerToken();
        $user   = $request->user(); // Sanctum user (may be null)

        if (!$bearer) {
            return [false, false, null, 'missing_token'];
        }
        if (!$user) {
            return [false, false, null, 'invalid_token'];
        }

        // Role/ability detection
        $role = strtolower((string) data_get($user, 'role', ''));
        $token = method_exists($user, 'currentAccessToken') ? $user->currentAccessToken() : null;
        $canAdmin = $token ? $token->can('admin:read') : false;

        $isAdmin = $role === 'admin' || $canAdmin;
        $ownClientId = $user instanceof ClientMaster ? $user->client_id : null;

        return [true, $isAdmin, $ownClientId, null];
    }

    /** GET /api/clients */
    public function index(Request $request)
    {
        [$ok, $isAdmin, $ownClientId, $reason] = $this->who($request);
        if (!$ok) {
            if ($reason === 'missing_token') {
                return $this->error('Missing Authorization bearer token.', 401, [
                    'hint' => 'Send header: Authorization: Bearer <token>'
                ]);
            }
            if ($reason === 'invalid_token') {
                return $this->error('Invalid or expired token.', 401, [
                    'hint' => 'Log in again to obtain a fresh token.'
                ]);
            }
        }

        if ($isAdmin) {
            $clients = DB::table('client_master')
                ->select('id', 'client_id', 'client_name', 'contact_email', 'status', 'total_spend', 'created_at')
                ->orderBy('client_name')
                ->get();

            return response()->json(['success' => true, 'data' => $clients]);
        }

        $client = $ownClientId
            ? DB::table('client_master')
            ->select('id', 'client_id', 'client_name', 'contact_email', 'status', 'total_spend', 'created_at')
            ->where('client_id', $ownClientId)
            ->first()
            : null;

        return response()->json([
            'success' => true,
            'data'    => $client ? [$client] : [],   // keep array shape consistent
        ]);
    }

    /** GET /api/clients/{clientId}/data */
    public function dataByClient(string $clientId, Request $request)
    {
        [$ok, $isAdmin, $ownClientId, $reason] = $this->who($request);

        if (!$ok) {
            if ($reason === 'missing_token') {
                return $this->error('Missing Authorization bearer token.', 401, [
                    'hint' => 'Send header: Authorization: Bearer <token>'
                ]);
            }
            if ($reason === 'invalid_token') {
                return $this->error('Invalid or expired token.', 401, [
                    'hint' => 'Log in again to obtain a fresh token.'
                ]);
            }
        }

        // Optional: basic format validation if your client IDs follow a pattern
        if ($clientId === '' || strlen($clientId) > 64 || !Str::of($clientId)->match('/^[A-Za-z0-9_\-]+$/')) {
            return $this->error('Invalid clientId format.', 422);
        }

        // client can only access own client_id
        if (!$isAdmin && $ownClientId !== $clientId) {
            return $this->error('Forbidden: you can only access your own data.', 403);
        }

        $client = ClientMaster::where('client_id', $clientId)->first();
        if (!$client) {
            return $this->error('Client not found.', 404);
        }

        $rows = DataRecord::where('client_id', $clientId)
            ->where('reporting_start', '<=', '2025-08-31')
            ->where('reporting_end', '>=', '2025-08-01')
            ->orderBy('reporting_start', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'client'  => [
                'clientId'   => $client->client_id,
                'clientName' => $client->client_name,
            ],
            'data' => DataRecordResource::collection($rows),
        ]);
    }
    /** POST /api/clients  (admin only) */
    public function store(Request $request)
    {
        [$ok, $isAdmin, $ownClientId, $reason] = $this->who($request);
        if (!$ok) {
            if ($reason === 'missing_token') {
                return $this->error('Missing Authorization bearer token.', 401, [
                    'hint' => 'Send header: Authorization: Bearer <token>'
                ]);
            }
            if ($reason === 'invalid_token') {
                return $this->error('Invalid or expired token.', 401, [
                    'hint' => 'Log in again to obtain a fresh token.'
                ]);
            }
        }

        if (!$isAdmin) {
            return $this->error('Forbidden: admin only.', 403);
        }

        // ✅ Validation
        $validated = $request->validate([
            'client_name'   => ['required', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'phone'         => ['nullable', 'max:255'],
            'password'      => ['required', 'string', 'min:6', 'max:255'],
            'status'        => ['nullable', 'string', 'in:active,inactive'],
        ]);


        // ✅ Normalize status (default = active)
        $status = $validated['status'] ?? 'active';
        // dd($status);

        $client = DB::transaction(function () use ($validated, $status) {
            for ($i = 0; $i < 5; $i++) {
                $newId = $this->nextClientId();
                try {
                    return ClientMaster::create([
                        'client_id'     => $newId,
                        'client_name'   => $validated['client_name'],
                        'contact_email' => $validated['contact_email'] ?? null,
                        'phone'         => $validated['phone'] ?? null,
                        'email'         => $validated['contact_email'] ?? null,
                        'status'        => $status, // ✅ store as 'active' / 'inactive'
                        'password'      => bcrypt($validated['password']),
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    $msg = strtolower($e->getMessage());
                    if (str_contains($msg, 'duplicate') || str_contains($msg, 'unique')) continue;
                    throw $e;
                }
            }
            throw new \RuntimeException('Failed to allocate a unique client_id. Try again.');
        });

        // dd($client->status);

        return response()->json([
            'success' => true,
            'message' => 'Client created.',
            'data'    => [
                'id'            => $client->id,
                'client_id'     => $client->client_id,
                'client_name'   => $client->client_name,
                'contact_email' => $client->contact_email,
                'email'         => $client->email,
                'status'        => $client->status, // ✅ will show 'active' or 'inactive'
                'created_at'    => $client->created_at,
            ],
        ], 201);
    }


    /** PATCH /api/clients/{clientId}  (admin only) */
    public function update(string $clientId, Request $request)
{
    // Check user role and token status
    [$ok, $isAdmin, $ownClientId, $reason] = $this->who($request);
    if (!$ok) {
        if ($reason === 'missing_token') {
            return response()->json([
                'success' => false,
                'message' => 'Missing Authorization bearer token.',
                'hint' => 'Send header: Authorization: Bearer <token>'
            ], 401);
        }
        if ($reason === 'invalid_token') {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired token.',
                'hint' => 'Log in again to obtain a fresh token.'
            ], 401);
        }
    }

    if (!$isAdmin) {
        return response()->json([
            'success' => false,
            'message' => 'Forbidden: admin only.'
        ], 403);
    }

    // Validate path param format
    if ($clientId === '' || strlen($clientId) > 64 || !\Illuminate\Support\Str::of($clientId)->match('/^[A-Za-z0-9_\-]+$/')) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid clientId format.'
        ], 422);
    }

    $client = ClientMaster::where('client_id', $clientId)->first();
    if (!$client) {
        return response()->json([
            'success' => false,
            'message' => 'Client not found.'
        ], 404);
    }

    // Validate the update payload
    $validated = $request->validate([
        'client_name'   => ['nullable', 'string', 'max:255'],
        'contact_email' => ['nullable', 'email', 'max:255'],
        'phone'         => ['nullable', 'max:255'],
        'password'      => ['nullable', 'string', 'min:6', 'max:255'],
        'status'        => ['nullable', 'string', 'in:active,inactive'],
    ]);
    
    // dd($validated); // Debugging: Check what data is being validated

    // Normalize status (default = active)
    $status = $validated['status'] ?? $client->status; // preserve current status if not provided

    // Check if password is provided and not empty, if so, hash it
    if (isset($validated['password']) && !empty($validated['password'])) {
        $validated['password'] = bcrypt($validated['password']);
    } else {
        // If no password, keep the old password unchanged
        unset($validated['password']);
    }

    try {
        // Update the client with validated data
        \DB::transaction(function () use ($client, $validated, $status) {
            $client->fill($validated);
            $client->status = $status; // Ensure status is normalized
            $client->save();
        });

        return response()->json([
            'success' => true,
            'message' => 'Client updated.',
            'data'    => [
                'id'           => $client->id,
                'client_id'    => $client->client_id,
                'client_name'  => $client->client_name,
                'contact_email' => $client->contact_email,
                'phone'        => $client->phone,
                'status'       => $client->status,
            ],
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred.',
            'error' => $e->getMessage(),
        ], 500);
    }
}


    private function nextClientId(): string
    {
        // Example: C1001, C1002 ... C9999 (4 digits; bump if you need more)
        $maxNum = DB::table('client_master')
            ->selectRaw("MAX(CAST(SUBSTRING(client_id, 2) AS UNSIGNED)) as max_num")
            ->value('max_num');

        $base = $maxNum ? (int)$maxNum : 1000; // start at C1000 -> next is C1001
        $next = $base + 1;

        return 'C' . str_pad((string)$next, 4, '0', STR_PAD_LEFT);
    }
}
