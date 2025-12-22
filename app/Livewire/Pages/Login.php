<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
class Login extends Component
{
    #[Title('Login')]
    public function render()
    {
        return view('livewire.pages.login');
    }
}
