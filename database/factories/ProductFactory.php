<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stock = $this->faker->numberBetween(0, 50);
        return [
            'category_id' => Category::factory(),
            'name' => $this->faker->words(3, true),
            'sku' => strtoupper($this->faker->bothify('SKU-###??')),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'stock' => $stock,
            'is_active' => $stock > 0,
            'description' => $this->faker->sentence(12),
        ];
    }
}
