<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_blocked',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'password' => 'hashed',
        ];
    }
    public function isBlocked()
    {
        return $this->is_blocked;
    }

    public function block()
    {
        $this->update(['is_blocked' => true]);
    }

    public function unblock()
    {
        $this->update(['is_blocked' => false]);
    }

    /**
     * ⭐ UPDATED: Change from hasOne to hasMany
     * User dapat memiliki multiple cart items (1 user → many carts)
     * Sebelumnya: 1 user → 1 cart dengan many items
     * Sekarang: 1 user → many carts (setiap record = 1 item)
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get all orders for the user
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is regular user
     */
    public function isUser()
    {
        return $this->role === 'user';
    }
}