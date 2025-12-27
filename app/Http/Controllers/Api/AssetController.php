<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function index(Event $event)
    {
        return response()->json($event->assets()->latest()->get());
    }

    public function upload(Request $req, Event $event)
    {
        $req->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,webp,gif,mp4,mov,avi|max:51200' // 50MB
        ]);

        $path = $req->file('file')->store("events/{$event->id}", 'public');
        $url  = Storage::disk('public')->url($path);

        $asset = EventAsset::create([
            'event_id'    => $event->id,
            'file_path'   => $path,
            'file_url'    => $url,
            'mime'        => $req->file('file')->getClientMimeType(),
            'size_bytes'  => $req->file('file')->getSize(),
            'uploaded_by' => optional($req->user())->id,
        ]);

        // Optionally set as primary image if empty
        if (!$event->image_url && str_starts_with($asset->mime, 'image/')) {
            $event->update(['image_url' => $asset->file_url]);
        }

        return response()->json($asset, 201);
    }
}
