<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $table = 'portfolio_categories';

    protected $fillable = ['name', 'status'];

    public $timestamps = false;
}
