<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
            'total_price' => $this->faker->randomFloat(2, 10, 1000),
            'shipping_address' => $this->faker->address(),
        ];
    }
}
