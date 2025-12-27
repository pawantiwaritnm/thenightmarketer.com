<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smm extends Model
{
    use HasFactory;

    protected $table = 'smm_master';

    protected $fillable = [
        'client_id',
        'starting_date',
        'ending_date',
        'duration',
        'sheet_link',
        'type_of_plan',
        'social_media',
        'status',
        'added_on',
        'updated_on',
        'financial_year',
        'added_by'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function assignedUsers()
    {
        return $this->belongsToMany(AdminUser::class, 'smm_assign_to', 'smm_id', 'assign_to');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
