<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareerAttachment extends Model
{
    protected $fillable = [
        'career_id','file_path','original_name','mime_type','size_bytes','uploaded_ip'
    ];

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }

    // Accessor to get public URL if you store on 'public' disk
    public function getUrlAttribute(): string
    {
        return \Storage::disk('public')->url($this->file_path);
    }
}
