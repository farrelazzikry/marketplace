<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'discount_price',
        'stock',
        'size',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
    ];

    /**
     * ⭐ UPDATED: Removed CartItem relation
     * CartItem sudah di-merge ke Cart model
     * Sekarang Cart punya direct belongsTo(Product) relation
     */

    /**
     * Get all cart items for this product
     * ⭐ NEW: Direct relation ke Cart (bukan CartItem)
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get all order items for this product
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get discounted price (if discount_price exists, use it; otherwise use price)
     */
    public function getFinalPrice()
    {
        return $this->discount_price ?? $this->price;
    }

    /**
     * Check if product is on sale
     */
    public function isOnSale()
    {
        return !is_null($this->discount_price);
    }

    /**
     * Calculate discount percentage
     */
    public function getDiscountPercentage()
    {
        if (!$this->isOnSale()) {
            return 0;
        }

        return round(((($this->price - $this->discount_price) / $this->price) * 100));
    }

    /**
     * Check if product is in stock
     */
    public function isInStock()
    {
        return $this->stock > 0;
    }

    /**
     * Get available stock
     */
    public function getAvailableStock()
    {
        return max(0, $this->stock);
    }
}