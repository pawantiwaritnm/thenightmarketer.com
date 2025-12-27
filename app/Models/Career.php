<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'role', 'resume_path', 'cover', 'state', 'city', 'experience', 'risk_factor', 'reward_factor', 'overall_fit', 'justification', 'task_sent', 'linkedin'];

    public function locations()
    {
        return $this->hasMany(CareerLocation::class);
    }
      public function attachments(): HasMany
    {
        return $this->hasMany(CareerAttachment::class);
    }
}
