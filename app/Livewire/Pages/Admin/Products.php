<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Components\ProductFormModal;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
#[Title('Products')]
class Products extends Component
{
    public bool $showProductModal = false;
    public ?int $editingProductId = null;
    public ?array $flash_message = null;

    #[On('toggleProductModal')]
    public function toggleProductModal(ProductFormModal $productFormModal, $productId = null): void
    {
        $this->editingProductId = $productId;
        $this->showProductModal = !$this->showProductModal;
        if (!$this->showProductModal) {
            $productFormModal->resetForm();
        }
    }

    #[On('productCreated')]
    #[On('productUpdated')]
    public function handleProductChange($flash_message) : void
    {
        $this->flash_message = $flash_message;
    }

    public function render() : View
    {
        return view('livewire.pages.admin.products');
    }
}
