<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relationship with Case Studies
     */
    public function caseStudies()
    {
        return $this->belongsToMany(CaseStudy::class, 'case_study_tag', 'tag_id', 'case_study_id');
    }
}
