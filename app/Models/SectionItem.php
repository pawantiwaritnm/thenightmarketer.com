<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
    use HasFactory;

    protected $fillable = ['service_section_id', 'title', 'description', 'image'];

    public function section()
    {
        return $this->belongsTo(ServiceSection::class);
    }
}
