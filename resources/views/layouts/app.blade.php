<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <title>{{ $title ?? 'Page Title' }} - Tallcommerce</title>
</head>

<body>
<div class="grid grid-cols-10 w-full">
  <div class="hidden xl:block col-span-2">
    <x-sidebar :links="[
  'Dashboard' => route('dashboard'),
  'Products' => route('products'),
]"/>
  </div>
  <div class="col-span-10 xl:col-span-8 bg-gray-50 min-h-screen">
    {{ $slot }}
  </div>
</div>
@livewireScripts
</body>

</html>
