<?php

namespace App\Modules\Shared\Pages;

use Livewire\Component;

class FeedPage extends Component
{
    public function render()
    {
        return view('pages.feed')
            ->layout('layouts.app');
    }
}