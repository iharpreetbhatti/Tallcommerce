<x-admin-page>
  <x-page-header :heading="$heading" :subHeading="$subHeading"/>

  @if ($flashMessage)
    <p role="status" class="mb-4 rounded-md bg-emerald-100 px-4 py-3 text-sm text-emerald-800">
      {{ $flashMessage }}
    </p>
  @endif

  @error('status')
  <p role="alert" class="mb-4 rounded-md bg-red-100 px-4 py-3 text-sm text-red-800">
    {{ $message }}
  </p>
  @enderror

  <x-generic-list
    heading="All Orders"
    :headers="['Order', 'Placed', 'Total', 'Status']"
    :items="$orders"
    empty-message="No orders found."
  >
    @foreach ($orders as $order)
      <tr wire:key="order-{{ $order->id }}" class="border-b border-gray-300 hover:bg-gray-100">
        <td class="text-sm py-2 px-4">#{{ $order->id }}</td>
        <td class="text-sm py-2 px-4 text-center">{{ $order->created_at->format('d M Y') }}</td>
        <td class="text-sm py-2 px-4 text-center">₹{{ number_format((float) $order->total_price, 2) }}</td>
        <td class="text-sm py-2 px-4 text-center">
          <select
            id="order-status-{{ $order->id }}"
            wire:change="updateStatus({{ $order->id }}, $event.target.value)"
            wire:loading.attr="disabled"
            wire:target="updateStatus"
            class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-violet-500 focus:outline-none focus:ring-2 focus:ring-violet-200"
          >
            @foreach ($statusOptions as $status)
              <option value="{{ $status->value }}" @selected($order->status === $status)>{{ ucfirst($status->value) }}</option>
            @endforeach
          </select>
        </td>
      </tr>
    @endforeach

    @if ($orders->hasPages())
      <x-slot:pagination>
        {{ $orders->links() }}
      </x-slot:pagination>
    @endif
  </x-generic-list>
</x-admin-page>
