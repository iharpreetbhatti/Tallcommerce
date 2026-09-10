<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public function deleteProduct(Product $product) : void
    {
        $product->delete();
    }

    #[Url]
    public $searchTerm;
    #[Url]
    public $selectedCategory;

    public function updatingSearchTerm(): void
    {
        $this->resetPage();
    }

  public function updatingSelectedCategory(): void
  {
    $this->resetPage();
  }

    /**
     * @desc Get Categories from database
     * @return array $categories
     */
    public function getProductCategories(): array {
        $categories = Category::all();
        return $categories->toArray();
    }


    #[On('productCreated')]
    #[On('productUpdated')]
    public function render(): View
    {
        $products = Product::query();

        if ($this->searchTerm) {
            $products->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        if ($this->selectedCategory) {
          $products->where('category_id', '=',  $this->selectedCategory);
        }

        $products = $products->latest()->paginate(10);

        return view('livewire.components.product-list')->with('products', $products);
    }
}
