<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
    protected $table = 'products';

=======
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'discount_price',
        'stock',
        'size',
<<<<<<< HEAD
        'image'
    ];

    // CART ITEMS
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // ORDER ITEMS
=======
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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
<<<<<<< HEAD
=======

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
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
}