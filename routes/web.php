<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Dashboard;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/dashboard', Dashboard::class)
    ->name('dashboard');