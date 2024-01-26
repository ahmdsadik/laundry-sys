<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderDetailFactory extends Factory
{
    protected $model = OrderDetail::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'quantity' => $this->faker->word(),
            'price' => $this->faker->randomNumber(),
            'order_id' => $this->faker->randomNumber(),
            'item_service_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
