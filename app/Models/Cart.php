<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'user_id'
    ];

    // relasi ke cart items
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    // relasi ke user
=======
    use HasFactory;

    /**
     * ⭐⭐⭐ CRITICAL REFACTOR ⭐⭐⭐
     * 
     * SEBELUMNYA (dengan CartItem):
     *   - 1 user → 1 cart (unique user_id)
     *   - 1 cart → many cart_items
     * 
     * SEKARANG (CartItem di-MERGE):
     *   - 1 user → many carts (NOT unique, multiple per user)
     *   - Setiap cart record = 1 item dalam shopping cart
     *   - Fields: user_id, product_id, quantity, size
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'size', // nullable untuk produk tanpa size variant
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'integer',
    ];

    /**
     * Cart belongs to a User
     * Many carts dapat dimiliki oleh 1 user
     */
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
=======

    /**
     * ⭐ NEW RELATION: Cart directly belongs to Product
     * Sebelumnya: Cart → CartItem → Product
     * Sekarang: Cart → Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * ⭐ REMOVED: hasMany(CartItem) relation
     * CartItem model sudah tidak ada, struktur di-merge ke Cart
     */

    /**
     * Calculate subtotal untuk item ini
     * subtotal = product price (atau discount_price) × quantity
     */
    public function getSubtotal()
    {
        $price = $this->product->getFinalPrice();
        return $price * $this->quantity;
    }

    /**
     * Get product price (dengan discount jika ada)
     */
    public function getProductPrice()
    {
        return $this->product->getFinalPrice();
    }

    /**
     * Check if this cart item is available
     * (product exists, in stock, quantity <= available stock)
     */
    public function isAvailable()
    {
        if (!$this->product || !$this->product->isInStock()) {
            return false;
        }

        return $this->quantity <= $this->product->getAvailableStock();
    }

    /**
     * Increment quantity
     */
    public function incrementQuantity($amount = 1)
    {
        $this->increment('quantity', $amount);
        return $this;
    }

    /**
     * Decrement quantity
     */
    public function decrementQuantity($amount = 1)
    {
        if ($this->quantity > $amount) {
            $this->decrement('quantity', $amount);
        }
        return $this;
    }
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
}