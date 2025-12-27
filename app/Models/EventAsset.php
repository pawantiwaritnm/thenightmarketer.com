<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAsset extends Model
{
    protected $fillable = [
        'event_id','file_path','file_url','mime','size_bytes','uploaded_by'
    ];

    public function event()    { return $this->belongsTo(Event::class); }
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable')
                    ->where('commentable_type','event_asset');
    }
}
