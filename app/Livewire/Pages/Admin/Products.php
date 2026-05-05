<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Components\ProductFormModal;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use App\Models\Product;

#[Layout('layouts.app')]
#[Title('Products')]
class Products extends Component
{
    public bool $showProductModal = false;
    public ?int $editingProductId = null;
    public ?array $flash_message = null;

    #[On('toggleProductModal')]
    public function toggleProductModal(ProductFormModal $productFormModal, $productId = null)
    {
        $this->editingProductId = $productId;
        $this->showProductModal = !$this->showProductModal;
        if (!$this->showProductModal) {
            $productFormModal->resetForm();
        }
    }

    #[On('productCreated')]
    #[On('productUpdated')]
    public function handleProductChange($flash_message)
    {
        $this->flash_message = $flash_message;
    }

    public function render()
    {
        return view('livewire.pages.admin.products');
    }
}