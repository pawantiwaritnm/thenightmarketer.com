<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Event;
use App\Models\EventAsset;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    public function indexForEvent(Event $event)
    {
        // Now returns ALL comments tied to this event (both on event & its assets)
        $comments = Comment::where('event_id', $event->id)
            ->with(['user:id,name'])   // author info
            ->orderBy('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $comments
        ]);
    }

    public function storeForEvent(Request $req, Event $event)
    {
        $data = $this->validateComment($req);

        $comment = Comment::create([
            'event_id'        => $event->id,          // NEW
            'commentable_type'=> 'event',
            'commentable_id'  => $event->id,
            'author_type'     => $data['author_type'],
            'user_id'         => optional($req->user())->id,
            'body'            => $data['body'],
        ]);

        return response()->json(['success' => true, 'data' => $comment->load('user:id,name')], 201);
    }

    public function indexForAsset(EventAsset $asset)
    {
        $comments = Comment::where('commentable_type','event_asset')
            ->where('commentable_id', $asset->id)
            ->with(['user:id,name'])
            ->orderBy('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $comments
        ]);
    }

    public function storeForAsset(Request $req, EventAsset $asset)
    {
        $data = $this->validateComment($req);

        $comment = Comment::create([
            'event_id'        => $asset->event_id,    // NEW ties it to parent event
            'commentable_type'=> 'event_asset',
            'commentable_id'  => $asset->id,
            'author_type'     => $data['author_type'],
            'user_id'         => optional($req->user())->id,
            'body'            => $data['body'],
        ]);

        return response()->json(['success' => true, 'data' => $comment->load('user:id,name')], 201);
    }

    private function validateComment(Request $req): array
    {
        return $req->validate([
            'author_type' => ['required', Rule::in(['Client','Team','System'])],
            'body'        => 'required|string|max:4000',
        ]);
    }
}