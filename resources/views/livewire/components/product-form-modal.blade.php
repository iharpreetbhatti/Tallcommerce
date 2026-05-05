<div class="fixed inset-0 z-40 flex items-center justify-center">
  <div class="absolute inset-0 bg-black opacity-50" wire:click="$dispatch('toggleProductModal')"></div>

  <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-50 p-6">
    <h3 class="text-lg font-semibold mb-4">
      {{ $productId ? 'Edit Product' : 'Add New Product' }}
    </h3>

    <form wire:submit.prevent="saveProduct">
      <div class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Product Name</label>
          <input type="text" placeholder="Enter product name" wire:model.defer="name"
            class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select wire:model.defer="category_id" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
              <option value="">Select category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">SKU</label>
            <input type="text" placeholder="e.g., SKU-001" wire:model.defer="sku"
              class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" step="0.01" placeholder="0.00" wire:model.defer="price"
              class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" placeholder="0" wire:model.defer="stock"
              class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Description</label>
          <textarea placeholder="Enter product description" wire:model.defer="description"
            class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" rows="4"></textarea>
        </div>
      </div>

      <div class="mt-6 flex justify-end space-x-3">
        <button type="button" wire:click="$dispatch('toggleProductModal')"
          class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300">Cancel</button>
        <button type="submit" class="px-4 py-2 rounded bg-violet-500 text-white hover:bg-violet-700">Save
          Product</button>
      </div>
    </form>
  </div>
</div>
