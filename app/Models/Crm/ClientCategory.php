<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCategory extends Model
{
    use HasFactory;

    protected $table = 'client_category_master';

    protected $fillable = ['category', 'status'];

    public $timestamps = false;
}
