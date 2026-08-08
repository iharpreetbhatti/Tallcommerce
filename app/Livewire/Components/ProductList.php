<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public function deleteProduct($productId) : void
    {
        $product = Product::find($productId);
        $product?->delete();
    }

    #[On('productCreated')]
    #[On('productUpdated')]
    public function render(): View
    {
        $products = Product::latest()->paginate(10);
        return view('livewire.components.product-list')->with('products', $products);
    }
}
