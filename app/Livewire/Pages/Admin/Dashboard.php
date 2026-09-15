<?php

namespace App\Livewire\Pages\Admin;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.admin.app')]
class Dashboard extends Component
{
    #[Title('Dashboard')]
    public function render(): View
    {
        return view('livewire.pages.admin.dashboard');
    }
}
