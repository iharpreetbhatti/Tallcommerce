@props(['links'])

<div class="sticky top-0 h-screen overflow-y-auto border-r border-gray-300 bg-white">
  <div class="logo p-4 my-4 border-b border-b-gray-300">
    <h2 class="text-lg">Tallcommerce</h2>
    <h4 class="text-sm text-gray-500">Admin Panel</h4>
  </div>
    <ul class="m-4">
      @foreach($links as $label => $url)
      <li><a href="{{$url}}" class="block my-1 p-2 hover:bg-gray-100 focus:text-shadow-violet-500 focus:bg-violet-100" wire:navigate>{{ucfirst($label)}}</a></li>
      @endforeach
    </ul>
</div>
