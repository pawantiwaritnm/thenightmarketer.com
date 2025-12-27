<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudySection extends Model
{
    use HasFactory;

    protected $table = 'case_study_sections';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'case_study_id',
        'section_type',
        'heading',
        'content',
        'image',
        'order'
    ];

    /**
     * Relationship: A section belongs to a case study.
     */
    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class);
    }
}
