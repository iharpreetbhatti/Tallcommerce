<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Dashboard;

Route::get('/admin/dashboard', Dashboard::class)
    ->name('dashboard');

Route::redirect('/admin', '/admin/dashboard');