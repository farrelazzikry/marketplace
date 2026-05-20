<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'discount_price',
        'stock',
        'size',
        'image'
    ];

    // CART ITEMS
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // ORDER ITEMS
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}