<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Product;

#[Layout('layouts.app')]
#[Title('Products')]
class Products extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.products');
    }
}
