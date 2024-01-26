<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'total_price',
        'status',
        'payment_status',
        'customer_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'status' => OrderStatus::class,
        'payment_status' => PaymentStatus::class
    ];
}
