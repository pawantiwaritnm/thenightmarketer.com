<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $table = 'meetings';

    protected $fillable = [
        'project_id',
        'agenda',
        'date',
        'upload_file',
        'link',
        'status',
        'added_on',
        'added_by'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'date' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
