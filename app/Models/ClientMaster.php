<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;  // ⬅ extends Authenticatable
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ClientMaster extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'client_master';

    // Use numeric `id` instead of string client_id
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'client_id',
        'client_name',
        'email',
        'phone',
        'password',
        'contact_email',
        'notes',
        'status',
        'total_spend',
        'created_at',
    ];

    // We aren't using updated_at/created_at managed by Eloquent
    public $timestamps = false;

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'total_spend' => 'decimal:2',
    ];

    public function data(): HasMany
    {
        return $this->hasMany(DataRecord::class, 'client_id', 'client_id');
    }
}
