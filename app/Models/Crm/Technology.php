<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $table = 'technology_master';

    protected $fillable = [
        'name',
        'status'
    ];

    public $timestamps = false;

    // Relationships
    public function projects()
    {
        return $this->hasMany(Project::class, 'technology_id');
    }
}
