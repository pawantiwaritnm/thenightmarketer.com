<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'asset_master';

    protected $fillable = [
        'file_name',
        'client_id',
        'link',
        'added_on',
        'updated_on',
        'status',
        'added_by',
        'financial_year'
    ];

    protected $casts = [
        'added_on' => 'datetime',
        'updated_on' => 'datetime',
    ];

    public $timestamps = false;

    // Relationships
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function images()
    {
        return $this->hasMany(AssetImage::class, 'asset_id');
    }

    public function categories()
    {
        return $this->belongsToMany(AssetCategory::class, 'asset_cat', 'asset_class_id', 'cat_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(AdminUser::class, 'added_by');
    }
}
