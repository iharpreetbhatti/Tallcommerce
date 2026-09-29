<?php

namespace App\Livewire\Pages\Admin;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Orders')]
class Orders extends Component
{
  public string $heading = 'Orders';
  public string $subHeading = 'Manage and track Customer orders';

  public function render(): View
  {
    return view('livewire.pages.admin.orders');
  }
}
