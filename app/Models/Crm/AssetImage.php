<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetImage extends Model
{
    use HasFactory;

    protected $table = 'asset_images';

    protected $fillable = ['image', 'asset_id', 'added_on'];

    protected $casts = ['added_on' => 'datetime'];

    public $timestamps = false;

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
