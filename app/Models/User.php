<?php

namespace App\Models;
<<<<<<< HEAD
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

=======

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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
<<<<<<< HEAD
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // RELASI KE ORDER
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

<<<<<<< HEAD
    // RELASI KE CART
    public function cart()
    {
        return $this->hasOne(Cart::class);
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    }
}