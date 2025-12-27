<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $table = 'add_reminders';

    protected $fillable = [
        'reminder_name',
        'description',
        'reminder_client',
        'reminder_project',
        'reminder_date',
        'status',
        'added_on',
        'updated_on',
        'added_by'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
        'reminder_date' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class, 'reminder_client');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'reminder_project');
    }

    public function users()
    {
        return $this->belongsToMany(AdminUser::class, 'add_reminders_user', 'reminders_id', 'user_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
