<?php

namespace App\Modules\Post\Home\Infrastructure\Components\Pages;

use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {
        return view('pages.dashboard')
            ->layout('layouts.app');
    }
}