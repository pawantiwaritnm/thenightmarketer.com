<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataRecordResource extends JsonResource
{
    /** @param \Illuminate\Http\Request $request */
    public function toArray($request)
    {
        return [
            'campaignName' => $this->campaign_name,
            'ads' => $this->ads,
            'resultType' => $this->result_type,
            'results' => $this->results ? (int)$this->results : 0,
            'reach' => $this->reach ? (int)$this->reach : 0,
            'impressions' => $this->impressions ? (int)$this->impressions : 0,
            'costPerResult' => $this->cost_per_result !== null ? (float)$this->cost_per_result : null,
            'amountSpent' => $this->amount_spent ?? $this->amount,
            'conversionValue' => $this->website_purchase_conversions ?? null,
            'purchases' => $this->website_purchases ?? $this->results,
            'roas' => $this->website_purchase_roas ?? null,
            'addsToCart' => $this->website_adds_to_cart ?? 0,
            'costPerPurchase' => $this->cost_per_purchase ?? $this->cost_per_result,
            'reportingStarts' => $this->reporting_start ? $this->reporting_start->toDateString() : ($this->date ? $this->date->toDateString() : null),
            'reportingEnds' => $this->reporting_end ? $this->reporting_end->toDateString() : null,
        ];
    }
}
