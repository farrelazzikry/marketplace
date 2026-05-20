<?php

namespace App\Models;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // RELASI KE ORDER
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // RELASI KE CART
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}