<?php

namespace Database\Factories;

use App\Models\ItemService;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemServiceFactory extends Factory
{
    protected $model = ItemService::class;

    public function definition(): array
    {
        return [
            'service_id' => $this->faker->randomNumber(),
            'item_id' => $this->faker->randomNumber(),
            'price' => $this->faker->randomNumber(),
        ];
    }
}
