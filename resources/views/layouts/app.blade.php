<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <title>{{ $title ?? 'Page Title' }} - Tallcommerce</title>
</head>

<body
  x-data="{ sidebarOpen: window.matchMedia('(min-width: 1280px)').matches }"
  @resize.window="sidebarOpen = window.matchMedia('(min-width: 1280px)').matches"
>
<div class="grid grid-cols-10 w-full">
  <div class="col-span-10 xl:col-span-2">
    <div
      x-cloak
      x-show="sidebarOpen"
      x-transition.opacity
      x-on:click="sidebarOpen = false"
      class="fixed inset-0 z-30 bg-gray-300/10 backdrop-blur-xs xl:hidden"
      aria-hidden="true"
    ></div>
    <x-sidebar :links="[
      'Dashboard' => route('dashboard'),
      'Products' => route('products'),
    ]"/>
  </div>
  <div class="col-span-10 xl:col-span-8 bg-gray-50 min-h-screen">
    <x-topbar />
    {{ $slot }}
  </div>
</div>
@livewireScripts
</body>

</html>
