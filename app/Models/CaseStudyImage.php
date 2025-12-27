<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudyImage extends Model
{
    use HasFactory;

    protected $table = 'case_study_images';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'case_study_id',
        'image_path',
        'caption',
        'alt_text',
        'order'
    ];

    /**
     * Relationship: An image belongs to a case study.
     */
    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class);
    }
}
