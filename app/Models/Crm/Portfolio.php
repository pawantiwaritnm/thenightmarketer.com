<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'add_portfolio';

    protected $fillable = [
        'client_project_name',
        'industry',
        'url',
        'android_app_url',
        'mobile_app_url',
        'category_id',
        'status',
        'upload_file',
        'added_on',
        'figma_link',
        'updated_on',
        'added_by',
        'financial_year'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }

    public function industryRelation()
    {
        return $this->belongsTo(Industry::class, 'industry');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
