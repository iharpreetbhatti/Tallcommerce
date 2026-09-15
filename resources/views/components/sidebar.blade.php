@props(['links'])

<aside
  x-cloak
  x-show="sidebarOpen"
  x-transition:enter="transition ease-out duration-200"
  x-transition:enter-start="-translate-x-full"
  x-transition:enter-end="translate-x-0"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="translate-x-0"
  x-transition:leave-end="-translate-x-full"
  class="fixed inset-y-0 left-0 z-40 w-72 overflow-y-auto border-r border-gray-300 bg-white xl:sticky xl:top-0 xl:h-screen xl:w-auto"
>
  <div class="logo my-4 flex items-start justify-between border-b border-b-gray-300 p-4">
    <div>
      <h2 class="text-lg">Tallcommerce</h2>
      <h4 class="text-sm text-gray-500">Admin Panel</h4>
    </div>

    <button
      type="button"
      aria-label="Close navigation menu"
      x-on:click="sidebarOpen = false"
      class="inline-flex items-center justify-center rounded-lg p-2 text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-violet-500 xl:hidden"
    >
      <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
      </svg>
    </button>
  </div>

  <ul class="m-4">
    @foreach($links as $label => $url)
    <li><a href="{{$url}}" class="block my-1 px-4 py-2 rounded-md hover:bg-gray-100" wire:navigate>{{ucfirst($label)}}</a></li>
    @endforeach
  </ul>
</aside>
