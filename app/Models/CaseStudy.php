<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $table = 'case_studies';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'challenge_title',
        'challenge_desc',
        'client_logo',
        'summary',
        'duration',
        'services',
        'lessons_title',
        'lessons_desc_1',
        'lessons_desc_2',
        'solution_title',
        'solution_desc',
        'statistics_lable',
        'statistics',
        'banner_image',
        'banner_background',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'services' => 'array',
    ];

    /**
     * Relationship: A case study has many sections.
     */
    public function sections()
    {
        return $this->hasMany(CaseStudySection::class);
    }

    /**
     * Relationship: A case study has many images.
     */
    public function images()
    {
        return $this->hasMany(CaseStudyImage::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'case_study_tag', 'case_study_id', 'tag_id');
    }

    
}
