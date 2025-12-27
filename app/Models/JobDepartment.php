<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDepartment extends Model
{
    use HasFactory;

    protected $table = 'job_departments';

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function jobListings()
    {
        return $this->hasMany(JobListing::class, 'department_id');
    }
}
