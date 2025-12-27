<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = ['industry_name', 'status'];

    public function clients()
    {
        return $this->hasMany(Client::class, 'industry_id');
    }
    
}
