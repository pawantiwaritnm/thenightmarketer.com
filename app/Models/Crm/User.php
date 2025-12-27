<?php

namespace App\Models\Crm;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'designation',
        'phone',
        'status',
        'image',
        'financial_year',
        'added_by',
    ];

    /**
     * Get the user's display name (using username)
     */
    public function getNameAttribute()
    {
        return $this->username;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'added_on' => 'datetime',
            'updated_on' => 'datetime',
        ];
    }

    /**
     * Check if user is admin (role 1)
     */
    public function isAdmin(): bool
    {
        return $this->role == 1;
    }

    /**
     * Check if user is manager (role 2)
     */
    public function isManager(): bool
    {
        return $this->role == 2;
    }

    /**
     * Check password against MD5 hash (temporary - will migrate to bcrypt)
     */
    public function checkPasswordMd5(string $password): bool
    {
        return $this->password === md5($password);
    }

    /**
     * Set password using MD5 (temporary compatibility)
     */
    public function setPasswordMd5Attribute($value)
    {
        $this->attributes['password'] = md5($value);
    }
}
