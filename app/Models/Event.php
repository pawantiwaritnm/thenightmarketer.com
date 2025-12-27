<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Event extends Model
{
    protected $fillable = [
        'event_name','event_date','image_url','image_path','status','client_name','assigned_to','client_id','image_path', 'posting_time'
    ];

    protected $casts = ['event_date' => 'date'];

    // Add this so JSON includes a name for assigned_to
    protected $appends = ['assigned_to_name'];

    public function assets()
    {
        return $this->hasMany(EventAsset::class);
    }

    // All comments for this event (includes comments on event + on its assets)
    public function allComments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at');
    }

    // Keep your original morph if you still want only direct event comments
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->where('commentable_type','event');
    }

    public function statusHistory()
    {
        return $this->hasMany(EventStatusHistory::class)->latest();
    }

    // Assignee relation (assuming you have a User model)
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to')->select('id','name');
    }

    // Accessor for assigned_to_name
    protected function assignedToName(): Attribute
    {
        return Attribute::get(fn () => $this->assignedTo?->name);
    }
}