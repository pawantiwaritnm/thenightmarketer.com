<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    protected $fillable = [
        'country', 'country_code', 'location',
        'name', 'email', 'phone', 'industry', 'team_size', 'company',
        'ip', 'user_agent',
    ];
}
