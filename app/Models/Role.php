<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * Get the permissions for the role
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions')
            ->withPivot('can_view', 'can_add', 'can_edit', 'can_delete', 'can_export')
            ->withTimestamps();
    }

    /**
     * Get the admins with this role
     */
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * Check if role has a specific permission
     */
    public function hasPermission($module, $action)
    {
        return $this->permissions()
            ->where('module', $module)
            ->wherePivot('can_' . $action, 1)
            ->exists();
    }
}
