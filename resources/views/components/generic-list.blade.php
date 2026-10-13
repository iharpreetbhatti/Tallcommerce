@props(['heading', 'headers', 'items', 'emptyMessage' => 'No records found.'])

<div {{ $attributes->class(['mx-auto p-8 rounded-xl border border-gray-200 bg-white']) }}>
  <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
    <h3 class="text-md">{{ $heading }}</h3>
  </div>
  <div class="overflow-x-auto mb-12">
    <table class="w-full mx-auto table-auto md:table-fixed">
      <thead>
        <tr class="border-b border-gray-300 hover:bg-gray-100">
          @foreach ($headers as $header)
            <th scope="col" class="{{ $loop->first ? 'text-left' : 'text-center' }} text-md font-semibold py-2 px-4">{{ $header }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @if ($items->count() === 0)
          <tr class="border-b border-gray-300">
            <td colspan="{{ count($headers) }}" class="text-sm py-2 px-4 text-center text-gray-500">
              {{ $emptyMessage }}
            </td>
          </tr>
        @else
          {{ $slot }}
        @endif
      </tbody>
    </table>
  </div>
  @isset($pagination)
    <div>
      {{ $pagination }}
    </div>
  @endisset
</div>
