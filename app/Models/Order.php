<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'payment_method',
        'phone_number',
        'address',
        'proof_of_payment',
        'status',
        'payment_status',
        'admin_note',
        'shipping_name',
        'shipping_phone',
        'shipping_address',
        'tracking_number',
        'midtrans_order_id',
        'midtrans_snap_token',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}