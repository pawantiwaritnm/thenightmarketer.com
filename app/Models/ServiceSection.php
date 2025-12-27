<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'title', 'image', 'section_type', 'description'];

    public function items()
    {
        return $this->hasMany(SectionItem::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
