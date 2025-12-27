<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'achievements',
        'cta1_heading',
        'cta1_button_text',
        'cta1_button_link',
        'cta1_note',
        'cta2_heading',
        'cta2_button_text',
        'cta2_button_link',
        'cta2_note',
        'stats',
        'desktop_banner',
        'mobile_banner',
        'description',
        'meta_title',
        'meta_desc',
        'meta_keywords',
        'is_city',
        'status',
        'service_type',
        'city_name',
    ];

    protected $casts = [
        'stats' => 'array',
        'status' => 'boolean',
        'is_city' => 'boolean',
    ];

    public function sections()
    {
        return $this->hasMany(ServiceSection::class);
    }

    /**
     * Define a relationship to the ServiceFAQ model.
     */
    public function faqs()
    {
        return $this->hasMany(ServiceFAQ::class);
    }
}