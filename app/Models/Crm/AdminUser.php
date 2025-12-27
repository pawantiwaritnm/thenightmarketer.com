<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'username',
        'password',
        'email',
        'mobile',
        'designation',
        'status',
        'added_on',
        'updated_on'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
    ];

    public $timestamps = false;
}
