<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    public function login(): void
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            $this->redirectIntended('/admin/dashboard', navigate: true);
            return;
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }

    public function render() : View
    {
        return view('livewire.login-form');
    }
}
