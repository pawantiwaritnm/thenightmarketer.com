<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['client_name', 'logo', 'website_url', 'industry_id', 'status', 'is_home'];

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }
    
}
