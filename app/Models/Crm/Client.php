<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'crm_client_master';

    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'poc_name',
        'poc_phone',
        'poc_email',
        'client_locations',
        'status',
        'added_on',
        'updated_on',
        'added_by',
        'financial_year'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function categories()
    {
        return $this->belongsToMany(ClientCategory::class, 'client_category', 'client_id', 'category_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
