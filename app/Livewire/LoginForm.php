<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    protected $email = '';
    protected $password = '';

    public function render()
    {
        return view('livewire.login-form');
    }

    public function login()
    {

    }
}
