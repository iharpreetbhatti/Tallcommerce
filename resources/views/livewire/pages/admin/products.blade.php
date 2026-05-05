<div class="bg-gray-50 py-4 min-h-screen">
  <!-- Add Product Modal -->
  @if ($showProductModal)
    <livewire:components.product-form-modal productId="{{ $editingProductId }}" />
  @endif

  <!-- Flash Messages -->
  @if ($flash_message)
    <div wire:key="flash-{{ md5(json_encode($flash_message)) }}">
      <x-flash-message :status="$flash_message['status']" :message="$flash_message['message']" />
    </div>
  @endif

  <div class="container mx-auto px-4">
    <!-- Header with Create Button -->
    <div class="flex justify-between flex-col sm:flex-row sm:items-center mb-6">
      <div>
        <h1 class="text-xl font-medium my-2">Products</h1>
        <p class="text-gray-500 text-lg mb-4">Manage your product inventory</p>
      </div>
      <button wire:click="toggleProductModal" class="px-4 py-2 bg-violet-500 text-white rounded hover:bg-violet-700">Add
        New Product</button>
    </div>

    <!-- Product List Component -->
    <livewire:components.product-list />
  </div>
</div>
