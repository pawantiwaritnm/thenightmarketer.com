<?php

// app/Models/PageMeta.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageMeta extends Model
{
    use HasFactory;

    protected $table = 'page_meta';

    protected $fillable = [
        'slug', 'meta_title', 'meta_description', 'meta_keyword'
    ];
}
