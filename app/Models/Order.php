<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'payment_type',
        'total_price',
        'paid_money',
        'remaining_money',
        'has_deferred_payment',
        'status',
        'payment_status',
        'customer_id',
        'user_id',
        'created_by_customer',
        'deliver_date',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'status' => OrderStatus::class,
        'payment_status' => PaymentStatus::class,
        'payment_type' => PaymentType::class
    ];

    protected static function booted()
    {
        self::creating(function (Order $order) {
            $order->order_code = self::getNextOrderCode();

            if (auth()->user() instanceof User) {
                $order->user_id = auth()->id();
            } else {
                $order->created_by_customer = true;
            }
        });
    }

    public static function getNextOrderCode()
    {
        $order_code = Order::whereMonth('created_at', now()->month)->max('order_code');
        if ($order_code) {
            return $order_code + 1;
        }
        return now()->format('yn') . '0001';
    }

    ########################## Relations ##########################

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
