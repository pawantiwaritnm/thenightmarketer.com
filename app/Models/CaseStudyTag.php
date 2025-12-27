<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudyTag extends Model
{
    use HasFactory;

    protected $table = 'case_study_tag';

    protected $fillable = ['case_study_id', 'tag_id'];

    /**
     * Relationship with Case Study
     */
    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class, 'case_study_id');
    }

    /**
     * Relationship with Tag
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
