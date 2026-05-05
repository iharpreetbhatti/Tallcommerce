@props(['status' => 'success', 'message', 'dismissAfter' => 5000])

<div x-data="{ show: true }" x-show="show" x-transition.opacity.duration.300ms x-init="setTimeout(() => show = false, {{ $dismissAfter }})"
  class="fixed place-self-center top-4 flex items-center justify-between gap-4 bg-{{ $status === 'success' ? 'emerald' : 'red' }}-100 border border-{{ $status === 'success' ? 'emerald' : 'red' }}-400 text-{{ $status === 'success' ? 'emerald' : 'red' }}-700 px-4 py-3 rounded z-50">
  {{ $message }}
  <button class="text-{{ $status === 'success' ? 'emerald' : 'red' }}-700" @click="show = false">
    ×
  </button>
</div>
