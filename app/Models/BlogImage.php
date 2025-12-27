<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'image'];
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
