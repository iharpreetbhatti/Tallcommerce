<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    // protected $listners = ['productCreated' => 'refreshList'];

    #[On('productCreated')]
    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.components.product-list')->with('products', $products);
    }
}
