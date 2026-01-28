<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class SampleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 6 categories
        $categories = Category::factory()->count(6)->create();


        //Create 60 products distributed across categories
        $categories->each(function ($category) {
            Product::factory()->count(10)->create([
                'category_id' => $category->id,
            ]);
        });
    }
}
