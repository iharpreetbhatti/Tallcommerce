<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\Products;
use App\Livewire\Pages\Login;

Route::get('/admin/dashboard', Dashboard::class)->middleware('auth')
    ->name('dashboard');

Route::get('/admin/products', Products::class)->middleware('auth')
    ->name('products');

Route::get('/login', Login::class)->middleware('guest')->name('login');

// Route::post('/login', [LoginForm::class, 'login'])->middleware('guest')->name('login.authenticate');

Route::redirect('/admin', '/admin/dashboard');