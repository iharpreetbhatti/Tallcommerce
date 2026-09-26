<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use RuntimeException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

class SampleOrderSeeder extends Seeder
{
  use WithoutModelEvents;

  /**
   * Run the database seeds.
   * @throws Throwable
   */
    public function run(): void
    {
      Schema::disableForeignKeyConstraints();
      Order::truncate();
      DB::table("order_product")->truncate();
      Schema::enableForeignKeyConstraints();

      $products = Product::query()
        ->select('id', 'price')
        ->limit(200)
        ->get();

      if ($products->isEmpty()) {
        throw new RuntimeException('Seed products before orders.');
      }

      for ($i = 0; $i < 30; $i++) {
        DB::transaction(function () use ($products) {
          $selectedProducts = $products->random(
            min(random_int(1, 4), $products->count())
          );

          $items = [];
          $totalPaisas = 0;

          foreach ($selectedProducts as $product) {
            $quantity = random_int(1, 3);
            $purchasePricePaisas = (int) round((float) $product->price * 100);

            $items[$product->id] = [
              'quantity' => $quantity,
              'purchase_price' => number_format($purchasePricePaisas / 100, 2, '.', ''),
            ];

            $totalPaisas += $purchasePricePaisas * $quantity;
          }

          // Adapt other required order fields in your factory as needed.
          $order = Order::factory()->create(['total_price' => '0.00']);

          $order->products()->attach($items);

          $order->update([
            'total_price' => number_format($totalPaisas / 100, 2, '.', ''),
          ]);
        });
      }
    }
}
