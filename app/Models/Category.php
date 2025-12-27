<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'image',
        'url',
        'status',
    ];

    // Accessor to get the full URL of the image
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/categories/' . $this->image) : null;
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    // Relationship to get parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
