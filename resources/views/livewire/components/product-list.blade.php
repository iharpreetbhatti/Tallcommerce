<div class="mx-auto p-8 rounded-xl border border-gray-200 bg-white">
  <table class="w-full mx-auto">
    <thead>
      <tr class="border-b-1 border-gray-300 hover:bg-gray-100">
        <th class="text-left text-md font-semibold py-2 px-4">Product</th>
        <th class="text-left text-md font-semibold py-2 px-4">Category</th>
        <th class="text-left text-md font-semibold py-2 px-4">Price</th>
        <th class="text-left text-md font-semibold py-2 px-4">Stock</th>
        <th class="text-left text-md font-semibold py-2 px-4">Status</th>
        <th class="text-center text-md font-semibold py-2 px-4">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr class="border-b-1 border-gray-300 last:border-b-0 hover:bg-gray-100">
          <td class="text-sm py-2 px-4">{{ ucfirst($product->name) }}</td>
          <td class="text-sm py-2 px-4">{{ $product->category->name }}</td>
          <td class="text-sm py-2 px-4">₹{{ $product->price }}</td>
          <td class="text-sm py-2 px-4">{{ $product->stock }}</td>
          <td class="text-sm py-2 px-4">{!! $product->is_active
              ? '<span class="bg-emerald-100 text-xs text-emerald-800 font-semibold py-1 px-2 rounded">Active</span>'
              : '<span class="bg-red-100 text-xs text-red-800 font-semibold py-1 px-2 rounded">Out of stock</span>' !!}</td>
          <td class="text-sm py-2 px-4 text-center font-medium"><a href="#">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
