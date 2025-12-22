<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Login;
use App\Livewire\LoginForm;

Route::get('/admin/dashboard', Dashboard::class)->middleware('auth')
    ->name('dashboard');

Route::get('/login', Login::class)->middleware('guest')->name('login');

Route::post('/login', LoginForm::class)->middleware('guest')->name('login.authenticate');

Route::redirect('/admin', '/admin/dashboard');