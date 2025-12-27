<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'add_notes';

    protected $fillable = [
        'topic',
        'date',
        'status',
        'added_on',
        'updated_on',
        'added_by',
        'text',
        'type'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
