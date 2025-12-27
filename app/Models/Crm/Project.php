<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'add_projects';

    protected $fillable = [
        'project_name',
        'project_type',
        'starting_date',
        'ending_date',
        'industry_id',
        'technology_id',
        'hourly',
        'project_hours',
        'client_id',
        'priority',
        'project_size',
        'financial_year',
        'some_details',
        'assign_priority',
        'status',
        'added_on',
        'updated_on',
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

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id');
    }

    public function marketers()
    {
        return $this->belongsToMany(AdminUser::class, 'add_project_marketer', 'project_id', 'marketer_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
