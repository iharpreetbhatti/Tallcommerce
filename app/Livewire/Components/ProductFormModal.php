<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Livewire\Pages\Admin\Products;

class ProductFormModal extends Component
{
    public $name = '';
    public $category_id = '';
    public $sku = '';
    public $price = '';
    public $stock = '';
    public $description = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'sku' => 'nullable|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
    ];

    public function resetForm()
    {
        $this->name = '';
        $this->category_id = '';
        $this->sku = '';
        $this->price = '';
        $this->stock = '';
        $this->description = '';
        $this->resetValidation();
    }

    public function saveProduct()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'sku' => $this->sku,
            'price' => $this->price,
            'stock' => $this->stock,
            'is_active' => $this->stock > 0,
            'description' => $this->description,
        ]);

        $this->dispatch('toggleCreateModal');
        $this->dispatch('productCreated');

        // redirect()->route('products')->with('flash_message', [
        //     'status' => 'success',
        //     'message' => 'Product created successfully!',
        // ]);
    }
    public function render()
    {
        $categories = Category::where('is_active', true)->get();
        return view('livewire.components.product-form-modal', ['categories' => $categories]);
    }
}
