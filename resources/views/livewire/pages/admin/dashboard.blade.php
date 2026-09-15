@php
  $user = auth()->user();

  if ($user) {
      $username = $user->name;
  } else {
      $username = 'Guest';
  }
@endphp

<main>
  <h1 class="text-center font-bold text-lg">Welcome <span class="text-violet-500">{{ $username }}</span> to
    Tallcommerce
  </h1>
</main>
