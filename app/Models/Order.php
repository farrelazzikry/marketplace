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
<<<<<<< HEAD
=======
        'tracking_number',
        'midtrans_order_id',
        'midtrans_snap_token',
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
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