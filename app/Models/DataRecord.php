<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataRecord extends Model
{
    protected $table = 'data_table';
    protected $primaryKey = 'record_id';
    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'date',
        'campaign_name',
        'ads',
        'result_type',
        'results',
        'reach',
        'impressions',
        'cost_per_result',
        'amount',
        // extended columns
        'amount_spent',
        'website_purchase_conversions',
        'website_purchases',
        'website_purchase_roas',
        'website_adds_to_cart',
        'cost_per_purchase',
        'reporting_start',
        'reporting_end',
    ];

    protected $casts = [
        'date' => 'date',
        'reporting_start' => 'date',
        'reporting_end' => 'date',
        'results' => 'integer',
        'reach' => 'integer',
        'impressions' => 'integer',
        'cost_per_result' => 'float',
        'amount' => 'float',
        'amount_spent' => 'float',
        'website_purchase_conversions' => 'float',
        'website_purchases' => 'integer',
        'website_purchase_roas' => 'float',
        'website_adds_to_cart' => 'integer',
        'cost_per_purchase' => 'float',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
