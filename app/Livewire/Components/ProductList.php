<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.components.product-list')->with('products', $products);
    }
}
