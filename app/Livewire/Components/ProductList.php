<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    #[On('productCreated')]
    #[On('productUpdated')]
    public function refreshList()
    {

    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
            $this->refreshList();
        }
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.components.product-list')->with('products', $products);
    }
}
