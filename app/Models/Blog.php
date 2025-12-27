<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'subtitle', 'desc','slug','date', 'sortOrder', 'image', 'author_id', 'metaTitle', 'metaKeyword', 'metaDesc', 'is_approved', 'first_approved', 'blog_category_id', 'tags', 'share_cnt', 'key_takeaways', 'status'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }
    public function images(): HasMany
    {
        return $this->hasMany(BlogImage::class);
    }
    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }
    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', '=', $status);
    }
}
