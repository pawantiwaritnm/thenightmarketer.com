<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventStatusHistory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ClientMaster;                    // <-- add
use Laravel\Sanctum\PersonalAccessToken;       // <-- add
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Uniform JSON error helper (same as ClientController).
     */
    private function error(string $message, int $status = 400, array $extra = [])
    {
        return response()->json(array_merge([
            'success' => false,
            'message' => $message,
        ], $extra), $status);
    }

    /**
     * Strict Bearer-based auth:
     * Returns: [ok, isAdmin, ownClientId, reason]
     */
    private function who(Request $request): array
    {
        $bearer = $request->bearerToken();
        if (!$bearer) {
            return [false, false, null, 'missing_token'];
        }

        // Resolve PAT from the raw bearer token (works without auth middleware)
        $pat = PersonalAccessToken::findToken($bearer);
        if (!$pat) {
            return [false, false, null, 'invalid_token'];
        }

        $user = $pat->tokenable; // could be User or ClientMaster
        if (!$user) {
            return [false, false, null, 'invalid_token'];
        }

        $role = strtolower((string) data_get($user, 'role', ''));
        $isAdmin = $pat->can('admin:read') || $pat->can('admin') || $role === 'admin';

        $ownClientId = null;
        if ($user instanceof ClientMaster) {
            $ownClientId = $user->client_id;
        } elseif (property_exists($user, 'client_id')) {
            $ownClientId = $user->client_id;
        }

        return [true, $isAdmin, $ownClientId, null];
    }

    /**
     * GET /api/events
     * - Admin: all events (with optional filters)
     * - Client: only their own client_id events
     */
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
                    'hint' => 'Ensure the token is correct and not revoked/expired.'
                ]);
            }
        }

        $status        = $request->query('status');
        $perPage       = (int) $request->query('per_page', 20);
        $commentsLimit = (int) $request->query('comments_limit', 3); // allow override ?comments_limit=5

        $query = Event::with([
            'assets',
            'assignedTo:id,name',
            // eager-load full set in correct order; we’ll slice per-event in PHP
            'allComments' => fn($q) => $q->with('user:id,name')->orderBy('created_at', 'desc'),
        ])
            ->withCount(['assets', 'allComments as comments_count'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderByDesc('event_date');

        if ($isAdmin) {
            if ($request->filled('client_id')) {
                $query->where('client_id', $request->query('client_id'));
            }
            if ($request->filled('assigned_to')) {
                $query->where('assigned_to', $request->query('assigned_to'));
            }
        } else {
            if (!$ownClientId) {
                return $this->error('Forbidden: no client scope found for this token.', 403);
            }
            $query->where('client_id', $ownClientId);
        }

        $paginated = $query->paginate($perPage);

        // Inject `comments` array (latest N) and remove the raw allComments relation
        $paginated->getCollection()->transform(function ($event) use ($commentsLimit) {
            // take latest N (we eager-loaded desc order)
            $latest = $event->allComments->take($commentsLimit)->values();

            // expose as `comments` in JSON
            $event->setRelation('comments', $latest);

            // optional: hide the internal relation so response is clean
            $event->unsetRelation('allComments');

            return $event;
        });

        return response()->json([
            'success' => true,
            'data'    => $paginated
        ]);
    }
    public function store(Request $req)
    {


        [$ok, $isAdmin, $ownClientId, $reason] = $this->who($req);
        if (!$ok) {
            if ($reason === 'missing_token') {
                return $this->error('Missing Authorization bearer token.', 401, [
                    'hint' => 'Send header: Authorization: Bearer <token>'
                ]);
            }
            if ($reason === 'invalid_token') {
                return $this->error('Invalid or expired token.', 401, [
                    'hint' => 'Ensure the token is correct and not revoked/expired.'
                ]);
            }
        }
        $payload = $req->all();

        if (array_key_exists('comments', $payload) && !is_array($payload['comments'])) {
            $raw = trim((string) $payload['comments']);

            if ($raw === '') {
                $payload['comments'] = [];
            } else {
                // If frontend sent JSON, decode it
                $decoded = json_decode($raw, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $payload['comments'] = $decoded;         // array of strings/objects
                } else {
                    // treat as a single plain-string comment
                    $payload['comments'] = [$raw];
                }
            }
        }

        $req->replace($payload);

        $baseRules = [
            'event_name'  => 'required|string|max:255',
            'event_date'  => 'required|date',
            'image_url'   => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'status'      => ['nullable', Rule::in(['pending', 'approved', 'disapproved', 'in_review'])],
            'assigned_to' => 'nullable|integer',
            'client_name' => 'nullable|string|max:255',
            'posting_time'   => 'nullable|date_format:H:i:s',

            'comment'                => 'nullable|string',
            'comments'               => 'nullable|array',
            'comments.*'             => 'nullable',          // allow string or object
            'comments.*.author_type' => 'nullable',
            'comments.*.body'        => 'nullable|string',
            'comments.*.text'        => 'nullable|string',
        ];
        if ($isAdmin) {
            $baseRules['client_id'] = 'required|string|max:64|exists:client_master,client_id';
        }

        $v = Validator::make($req->all(), $baseRules);
        if ($v->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $v->errors(),
            ], 422);
        }

        $data = $v->validated();

        $defaultAuthorType = $isAdmin ? 'Team' : 'Client';
        $initialComments = [];

        // single string comment
        if (!empty($data['comment']) && is_string($data['comment'])) {
            $initialComments[] = ['body' => (string) $data['comment'], 'author_type' => $defaultAuthorType];
        }

        // array comments: strings or objects {author_type?, body?/text?}
        if (!empty($data['comments']) && is_array($data['comments'])) {
            foreach ($data['comments'] as $c) {
                if (is_string($c)) {
                    $body = trim($c);
                    if ($body !== '') $initialComments[] = ['body' => $body, 'author_type' => $defaultAuthorType];
                } elseif (is_array($c)) {
                    $body = trim((string) ($c['body'] ?? $c['text'] ?? ''));
                    if ($body !== '') {
                        $author = $c['author_type'] ?? $defaultAuthorType;
                        $initialComments[] = ['body' => $body, 'author_type' => $author];
                    }
                }
            }
        }

        unset($data['comment'], $data['comments']);


        if ($isAdmin) {
            $clientId = $data['client_id'];
        } else {
            if (!$ownClientId) {
                return $this->error('Forbidden: no client scope found for this token.', 403);
            }
            $clientId = $ownClientId;
            unset($data['assigned_to']);
            $data['status'] = 'pending';
        }

        if (empty($data['client_name'])) {
            $cm = ClientMaster::where('client_id', $clientId)->first();
            $data['client_name'] = $cm?->client_name ?? 'Unknown Client';
        }
        $data['status'] = $data['status'] ?? 'pending';

        // handle file upload
        $imagePath = null;
        if ($req->hasFile('image')) {
            $imagePath = $req->file('image')->store('events', 'public');
            $data['image_url'] = Storage::disk('public')->url($imagePath);
        }

        $changedById = optional(PersonalAccessToken::findToken($req->bearerToken()))->tokenable_id;

        try {
            $created = DB::transaction(function () use ($data, $clientId, $changedById, $imagePath, $initialComments) {
                $payload = [
                    'event_name'   => $data['event_name'],
                    'event_date'   => $data['event_date'],
                    'posting_time' => $data['posting_time'] ?? null,
                    'client_id'    => $clientId,
                    'client_name'  => $data['client_name'],
                    'status'       => $data['status'] ?? 'pending',
                    'image_url'    => $data['image_url'] ?? null,
                    'image_path'   => $imagePath,
                ];

                if (array_key_exists('assigned_to', $data) && !is_null($data['assigned_to'])) {
                    $payload['assigned_to'] = (int) $data['assigned_to'];
                }

                $event = Event::create($payload);

                EventStatusHistory::create([
                    'event_id'    => $event->id,
                    'from_status' => null,
                    'to_status'   => $event->status,
                    'note'        => 'Created',
                    'changed_by'  => $changedById,
                ]);

                // initial comments
                if (!empty($initialComments)) {
                    $rows = array_map(function ($c) use ($event, $changedById) {
                        return [
                            'user_id'          => $changedById,
                            'author_type'      => $c['author_type'],
                            'body'             => $c['body'],
                            'event_id'         => $event->id,                 // keep if you have this column
                            'commentable_type' => 'event',   // <-- important
                            'commentable_id'   => $event->id,
                        ];
                    }, $initialComments);

                    $event->allComments()->createMany($rows);
                }

                $event = $event->fresh([
                    'assets',
                    'allComments'   => fn($q) => $q->with('user:id,name')->latest(),
                    'statusHistory' => fn($q) => $q->latest(),
                ]);

                // expose as `comments` only
                $event->setRelation('comments', $event->allComments);
                $event->unsetRelation('allComments');

                return $event;
            });

            // Optionally mirror allComments into comments in the response:
            $created->setRelation('comments', $created->allComments);

            return response()->json(['success' => true, 'data' => $created], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create event.',
                'error'   => config('app.debug') ? $e->getMessage() : 'server_error',
                'code'    => $e->getCode(),
            ], 500);
        }
    }
    public function edit(Request $req, Event $event)
    {
        

        // --- Auth & scope --------------------------------------------------------
        [$ok, $isAdmin, $ownClientId, $reason] = $this->who($req);
        if (!$ok) {
            if ($reason === 'missing_token') {
                return $this->error('Missing Authorization bearer token.', 401, [
                    'hint' => 'Send header: Authorization: Bearer <token>'
                ]);
            }
            return $this->error('Invalid or expired token.', 401, [
                'hint' => 'Ensure the token is correct and not revoked/expired.'
            ]);
        }

        // Only allow clients to edit their own events
        if (!$isAdmin) {
            if (!$ownClientId || $event->client_id !== $ownClientId) {
                return $this->error('Forbidden: you do not have access to this event.', 403);
            }
        }

        // --- Normalize possible stringified arrays (common with multipart) -------
        $payload = $req->all();

        // decode any JSON-strings
        foreach (['add_comments', 'edit_comments', 'delete_comment_ids', 'comments'] as $k) {
            if (array_key_exists($k, $payload) && !is_array($payload[$k])) {
                $decoded = json_decode((string) $payload[$k], true);
                if (json_last_error() === JSON_ERROR_NONE) $payload[$k] = $decoded;
            }
        }

        // alias: accept `comments` as `add_comments` for convenience
        if (isset($payload['comments']) && !isset($payload['add_comments'])) {
            $payload['add_comments'] = $payload['comments'];
            unset($payload['comments']);
        }

        $req->replace($payload);
        // ⬆️ END NORMALIZATION

        // --- Validate -------------------------------------------------------------
        $v = Validator::make($req->all(), [
            'event_name'  => 'sometimes|required|string|max:255',
            'event_date'  => 'sometimes|required|date',
            'client_name' => 'sometimes|required|string|max:255',
            'assigned_to' => 'nullable|integer', // only applied if admin below
            'image_url'   => 'nullable|url',
            'status'      => ['nullable', Rule::in(['pending', 'approved', 'disapproved', 'in_review'])],

            // image controls
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
            'remove_image'  => 'sometimes|boolean',          // if true, remove existing image
            'retain_image'  => 'sometimes|boolean',          // defaults to true if neither provided

            // comment operations
            'add_comments'                => 'nullable|array',
            'add_comments.*'              => 'nullable',      // string or object
            'add_comments.*.author_type'  => 'nullable|string',
            'add_comments.*.body'         => 'nullable|string',
            'add_comments.*.text'         => 'nullable|string',

            'edit_comments'               => 'nullable|array',
            'edit_comments.*.id'          => 'required|integer',
            'edit_comments.*.author_type' => 'nullable|string',
            'edit_comments.*.body'        => 'nullable|string',
            'edit_comments.*.text'        => 'nullable|string',

            'delete_comment_ids'          => 'nullable|array',
            'delete_comment_ids.*'        => 'integer',
        ]);

        if ($v->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $v->errors(),
            ], 422);
        }

        $data = $v->validated();

        // Non-admins cannot change assignment
        if (!$isAdmin) unset($data['assigned_to']);

        // --- Derived flags --------------------------------------------------------
        $removeImage = (bool) ($data['remove_image'] ?? false);
        $retainImage = array_key_exists('retain_image', $data) ? (bool)$data['retain_image'] : true;

        // --- Track status change for history -------------------------------------
        $newStatus = $data['status'] ?? null;
        $statusChanging = $newStatus && $newStatus !== $event->status;

        $changedById = optional(PersonalAccessToken::findToken($req->bearerToken()))->tokenable_id;

        // --- Begin transaction ----------------------------------------------------
        try {
            $updatedEvent = DB::transaction(function () use (
                $req,
                $event,
                $data,
                $removeImage,
                $retainImage,
                $statusChanging,
                $newStatus,
                $changedById,
                $isAdmin
            ) {
                // 1) Handle image updates/removals
                $oldPath = $event->image_path;

                if ($req->hasFile('image')) {
                    // Replace image
                    $path = $req->file('image')->store('events', 'public');
                    $event->image_path = $path;
                    $event->image_url  = Storage::disk('public')->url($path);

                    // delete old if existed
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                } elseif ($removeImage) {
                    // Explicitly remove image
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                    $event->image_path = null;
                    $event->image_url  = null;
                } elseif (!$retainImage && !$req->hasFile('image')) {
                    // If retain_image is false but no new image was posted, clear refs
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                    $event->image_path = null;
                    $event->image_url  = null;
                } else {
                    // keep current image as-is
                }

                // 2) Patch basic fields
                $fillable = [
                    'event_name',
                    'event_date',
                    'client_name',
                    'image_url'
                ];
                foreach ($fillable as $f) {
                    if (array_key_exists($f, $data)) $event->{$f} = $data[$f];
                }
                if ($isAdmin && array_key_exists('assigned_to', $data)) {
                    $event->assigned_to = $data['assigned_to'];
                }

                // 3) Status change + history
                if ($statusChanging) {
                    $from = $event->status;
                    $event->status = $newStatus;
                    // history stored after save (so we have final IDs)
                    $event->save();

                    EventStatusHistory::create([
                        'event_id'    => $event->id,
                        'from_status' => $from,
                        'to_status'   => $newStatus,
                        'note'        => 'Status updated via edit()',
                        'changed_by'  => $changedById,
                    ]);
                } else {
                    $event->save();
                }

                // 4) Comments: add / edit / delete
                $defaultAuthorType = $isAdmin ? 'Team' : 'Client';

                // Add
                if (!empty($data['add_comments']) && is_array($data['add_comments'])) {
                    $rows = [];
                    foreach ($data['add_comments'] as $c) {
                        if (is_string($c)) {
                            $body = trim($c);
                            if ($body === '') continue;
                            $rows[] = [
                                'user_id'          => $changedById,
                                'author_type'      => $defaultAuthorType,
                                'body'             => $body,
                                'event_id'         => $event->id,
                                'commentable_type' => 'event',
                                'commentable_id'   => $event->id,
                            ];
                        } elseif (is_array($c)) {
                            $body = trim((string)($c['body'] ?? $c['text'] ?? ''));
                            if ($body === '') continue;
                            $rows[] = [
                                'user_id'          => $changedById,
                                'author_type'      => $c['author_type'] ?? $defaultAuthorType,
                                'body'             => $body,
                                'event_id'         => $event->id,
                                'commentable_type' => 'event',
                                'commentable_id'   => $event->id,
                            ];
                        }
                    }
                    if (!empty($rows)) {
                        $event->allComments()->createMany($rows);
                    }
                }

                // Edit
                if (!empty($data['edit_comments']) && is_array($data['edit_comments'])) {
                    // assumes your comment model is App\Models\Comment
                    foreach ($data['edit_comments'] as $c) {
                        $comment = $event->allComments()->whereKey($c['id'])->first();
                        if (!$comment) continue; // ignore non-existent / not-belonging comments
                        $body = trim((string)($c['body'] ?? $c['text'] ?? ''));
                        if ($body !== '') $comment->body = $body;
                        if (!empty($c['author_type'])) $comment->author_type = $c['author_type'];
                        $comment->save();
                    }
                }

                // Delete
                if (!empty($data['delete_comment_ids']) && is_array($data['delete_comment_ids'])) {
                    $event->allComments()->whereIn('id', $data['delete_comment_ids'])->delete();
                }

                // Reload with relations
                $event = $event->fresh([
                    'assets',
                    'assignedTo:id,name',
                    'statusHistory' => fn($q) => $q->latest(),
                    'allComments'   => fn($q) => $q->with('user:id,name')->orderBy('created_at', 'desc'),
                ]);

                // mirror allComments -> comments (like your index/store)
                $event->setRelation('comments', $event->allComments);
                $event->unsetRelation('allComments');

                return $event;
            });

            return response()->json(['success' => true, 'data' => $updatedEvent]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update event.',
                'error'   => config('app.debug') ? $e->getMessage() : 'server_error',
                'code'    => $e->getCode(),
            ], 500);
        }
    }

    public function show(Event $event)
    {
        $event->load([
            'assets',
            'assignedTo:id,name',
            'statusHistory' => fn($q) => $q->latest(),
            // Full comment thread for the event
            'allComments'   => fn($q) => $q->with('user:id,name')->orderBy('created_at')
        ]);

        return response()->json(['success' => true, 'data' => $event]);
    }

    public function update(Request $req, Event $event)
    {
        $data = $req->validate([
            'event_name'  => 'sometimes|required|string|max:255',
            'event_date'  => 'sometimes|required|date',
            'client_name' => 'sometimes|required|string|max:255',
            'assigned_to' => 'nullable|integer',
            'image_url'   => 'nullable|url',
            'status'      => ['nullable', Rule::in(['pending', 'approved', 'disapproved', 'in_review'])],
        ]);

        $event->update($data);
        return response()->json($event->fresh());
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['deleted' => true]);
    }

    public function assign(Request $req, Event $event)
    {
        $data = $req->validate(['assigned_to' => 'required|integer']);
        $event->update($data);
        return response()->json($event->fresh());
    }

    public function changeStatus(Request $req, Event $event)
    {
        $data = $req->validate([
            'status' => ['required', Rule::in(['pending', 'approved', 'disapproved', 'in_review'])],
            'note'   => 'nullable|string|max:1000',
        ]);

        $from = $event->status;
        $event->update(['status' => $data['status']]);

        EventStatusHistory::create([
            'event_id'    => $event->id,
            'from_status' => $from,
            'to_status'   => $data['status'],
            'note'        => $data['note'] ?? null,
            'changed_by'  => optional($req->user())->id,
        ]);

        return response()->json($event->fresh(['statusHistory']));
    }
}
