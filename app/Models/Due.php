<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Due extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'month',
        'year',
        'link',
        'update',
        'note',
        'slug',
        'desc',
        'admin_id', //foreign key
    ];
    //Due has many DueDate
    public function dueDates(): HasMany
    {
        return $this->hasMany(DueDate::class);
    }
}
