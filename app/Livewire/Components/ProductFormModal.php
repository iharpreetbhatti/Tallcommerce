<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class ProductFormModal extends Component
{
    public $productId;
    public $name = '';
    public $category_id = '';
    public $sku = '';
    public $price = '';
    public $stock = '';
    public $description = '';

    public function mount($productId = null)
    {
        if ($productId) {
            $product = Product::findOrFail($this->productId);
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->category_id = $product->category_id;
            $this->sku = $product->sku;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->description = $product->description;
        }
    }

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
        $this->dispatch('toggleProductModal');
        if ($this->productId) {
            // Update existing product
            $product = Product::findOrFail($this->productId);
            $product->update([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'sku' => $this->sku,
                'price' => $this->price,
                'stock' => $this->stock,
                'is_active' => $this->stock > 0,
                'description' => $this->description,
            ]);
            $this->dispatch('productUpdated', flash_message: [
                'status' => 'success',
                'message' => 'Product updated successfully!',
            ]);

        } else {
            // Create new product
            Product::create([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'sku' => $this->sku,
                'price' => $this->price,
                'stock' => $this->stock,
                'is_active' => $this->stock > 0,
                'description' => $this->description,
            ]);
            $this->dispatch('productCreated', flash_message: [
                'status' => 'success',
                'message' => 'Product created successfully!',
            ]);
        }
    }
    public function render()
    {
        $categories = Category::where('is_active', true)->get();
        return view('livewire.components.product-form-modal', ['categories' => $categories]);
    }
}
