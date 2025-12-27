<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'admin';
    protected $guarded = ['id'];

    protected $fillable = ["name", "phone", "email", "password", "role", "pic", "bio","status","title","role_id"];

    /**
     * Get the role for the admin
     */
    public function adminRole()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Check if admin has permission for a module and action
     */
    public function hasPermission($module, $action)
    {
        if (!$this->adminRole) {
            return false;
        }
        return $this->adminRole->hasPermission($module, $action);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'author_id');
    }
    public function scopeSearch($query, $search): Builder
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%");
    }
}
