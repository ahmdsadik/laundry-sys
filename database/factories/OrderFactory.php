<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'order_code' => $this->faker->word(),
            'total_price' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(OrderStatus::cases()),
            'payment_status' => $this->faker->randomElement(PaymentStatus::cases()),
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
