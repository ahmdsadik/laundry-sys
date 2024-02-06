<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
    ];
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attribute) =>
            $attribute['first_name'] . ' ' . $attribute['last_name']
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
