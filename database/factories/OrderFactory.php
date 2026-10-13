<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(OrderStatus::cases()),
            'total_price' => 0.00,
            'shipping_address' => $this->faker->address(),
        ];
    }
}
