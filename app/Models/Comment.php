<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Comment extends Model
{
    protected $fillable = [
        'event_id',            // NEW
        'commentable_type',
        'commentable_id',
        'author_type',
        'user_id',
        'body'
    ];

    protected $appends = ['author_name'];

    public function commentable()
    {
        return $this->morphTo(__FUNCTION__, 'commentable_type', 'commentable_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // If you want to show who wrote it (basic):
    public function user()
    {
        return $this->belongsTo(User::class)->select('id','name');
    }

    protected function authorName(): Attribute
    {
        return Attribute::get(function () {
            if ($this->author_type === 'System') return 'System';
            return $this->user?->name ?? 'Unknown';
        });
    }
}