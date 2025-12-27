<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DueDate extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'desc',
        'type',
        'link',
    ];

    public function due(): BelongsTo
    {
        return $this->belongsTo(Due::class);
    }
}
