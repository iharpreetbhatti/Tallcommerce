<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Components\ProductFormModal;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Layout('layouts.app')]
#[Title('Products')]
class Products extends Component
{
    public bool $showCreateModal = false;

    #[On('toggleCreateModal')]
    public function toggleCreateModal(ProductFormModal $productFormModal)
    {
        $this->showCreateModal = !$this->showCreateModal;
        if (!$this->showCreateModal) {
            $productFormModal->resetForm();
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.products');
    }
}