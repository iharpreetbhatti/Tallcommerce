<div class="mx-auto p-8 rounded-xl border border-gray-200 bg-white">
  <div class="overflow-x-auto mb-12">
    <table class="w-full mx-auto table-auto md:table-fixed">
      <thead>
        <tr class="border-b border-gray-300
      hover:bg-gray-100">
          <th class="text-left text-md font-semibold py-2 px-4">Product</th>
          <th class="text-center text-md font-semibold py-2 px-4">Category</th>
          <th class="text-center text-md font-semibold py-2 px-4">Price</th>
          <th class="text-center text-md font-semibold py-2 px-4">Stock</th>
          <th class="text-center text-md font-semibold py-2 px-4">Status</th>
          <th class="text-center text-md font-semibold py-2 px-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr class="border-b border-gray-300 hover:bg-gray-100"
            wire:key="product-{{ $product->id }}">
            <td class="text-sm py-2 px-4">{{ ucfirst($product->name) }}</td>
            <td class="text-sm py-2 px-4 text-center">{{ $product->category->name }}</td>
            <td class="text-sm py-2 px-4 text-center">₹{{ $product->price }}</td>
            <td class="text-sm py-2 px-4 text-center">{{ $product->stock }}</td>
            <td class="text-sm py-2 px-4 text-center">{!! $product->is_active
                ? '<span class="bg-emerald-100 text-xs text-emerald-800 font-semibold py-1 px-2 rounded">Active</span>'
                : '<span class="bg-red-100 text-xs text-red-800 font-semibold py-1 px-2 rounded">Out of stock</span>' !!}</td>
            <td class="flex items-center justify-center gap-2 text-sm py-2 px-4 text-center font-medium">
              <button wire:click="$dispatch('toggleProductModal', { productId: {{ $product->id }} })"
                      class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md cursor-pointer">Edit</button>
                <button wire:click="deleteProduct({{ $product->id }})"
                  wire:confirm="Are you sure you want to delete this product?" wire:loading.attr="disabled"
                  class="inline-block px-4 py-2 bg-red-500 text-white rounded-md cursor-pointer">Delete</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div>
    {{ $products->links() }}
  </div>
</div>
