<?php

namespace App\Livewire\Pages;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
class Login extends Component
{
    #[Title('Login')]
    public function render(): View
    {
        return view('livewire.pages.login');
    }
}
