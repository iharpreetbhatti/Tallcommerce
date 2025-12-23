<form wire:submit="login">
  <div class="mb-4">
    @error('email')
      <span class="text-red-500">{{ $message }}</span>
    @enderror
    @error('password')
      <span class="text-red-500">{{ $message }}</span>
    @enderror
  </div>
  <div class="text-sm mb-4">
    <label class="text-sm font-medium block mb-2" for="email">Email</label>
    <input class="bg-gray-100 px-4 py-2 rounded-lg w-full outline-0" type="email" id="email" wire:model="email">
  </div>
  <div class="text-sm mb-4">
    <label class="font-medium block mb-2" for="password">Password</label>
    <input class="bg-gray-100 px-4 py-2 rounded-lg w-full outline-0" type="password" id="password"
      wire:model="password">
  </div>
  <div class="text-sm mb-4">
    <button class="bg-violet-500 hover:bg-violet-700 text-white rounded cursor-pointer font-medium px-8 py-2 w-full"
      type="submit">Login</button>
  </div>
</form>
