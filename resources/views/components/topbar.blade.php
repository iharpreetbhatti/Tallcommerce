@php
  $user = auth()->user();
@endphp

<header class="sticky top-0 z-20 border-b border-gray-200 bg-white">
  <div class="flex min-h-16 w-full items-center justify-between gap-4 px-4 sm:px-6">
    <button
      type="button"
      aria-label="Open navigation menu"
      x-on:click="sidebarOpen = true"
      class="inline-flex items-center justify-center rounded-lg p-2 text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-violet-500 xl:hidden"
    >
      <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <div class="relative ml-auto" x-data="{open: false}">
      <div class=" flex items-center gap-3 cursor-pointer hover:bg-gray-100 p-2 rounded-medium" x-on:click="open = !open">
      <div class="flex size-9 items-center justify-center rounded-full bg-violet-100 text-violet-600">
        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="12" cy="8" r="3" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 20a7 7 0 0 1 14 0" />
        </svg>
      </div>

      <div class="hidden min-w-0 sm:block">
        <p class="truncate text-sm font-medium text-gray-900">{{ $user->name }}</p>
        <p class="truncate text-xs text-gray-500">{{ $user->email }}</p>
      </div>
      </div>

      <div class="absolute min-w-24 sm:w-full top-full right-0 mt-4 bg-white border border-gray-300 rounded-md p-2" x-show.important="open" @click.outside="open = false" x-transition>
        @if(auth()->user())
        <livewire:logout />
        @endif
      </div>
    </div>
  </div>
</header>
