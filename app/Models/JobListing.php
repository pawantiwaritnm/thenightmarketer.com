<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'slug',
        'department_id', 
        'location',
        'type_id',     
        'skills_req',
        'short_desc',
        'minimum_exp',
        'long_desc',
        'status',
        'sort_order',
        'email_subject',
        'email_body',
    ];

    public function department()
    {
        return $this->belongsTo(JobDepartment::class);
    }

    public function type()
    {
        return $this->belongsTo(JobType::class);
    }
}
