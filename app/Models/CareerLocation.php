<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerLocation extends Model
{
    use HasFactory;

    protected $fillable = ['career_id', 'location'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
