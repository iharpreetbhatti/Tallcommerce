<?php

namespace App\Livewire\Pages\Admin;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.app')]
#[Title('Orders')]
class Orders extends Component
{
  use WithPagination;

  public string $heading = 'Orders';

  public string $subHeading = 'Manage and track Customer orders';

  public ?string $flashMessage = null;

  public function updateStatus(int $orderId, string $status): void
  {
    abort_unless(auth()->check(), 403);

    Validator::make(
      ['status' => $status],
      ['status' => ['required', Rule::enum(OrderStatus::class)]],
    )->validate();

    Order::findOrFail($orderId)->update(['status' => OrderStatus::from($status)]);

    $this->flashMessage = 'Order status updated.';
  }

  public function render(): View
  {
    return view('livewire.pages.admin.orders', [
      'orders' => Order::query()
        ->orderByDesc('created_at')
        ->orderByDesc('id')
        ->paginate(10),
      'statusOptions' => OrderStatus::cases(),
    ]);
  }
}
