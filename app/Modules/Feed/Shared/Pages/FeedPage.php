<?php

namespace App\Modules\Feed\Shared\Pages;

use Livewire\Component;

class FeedPage extends Component
{
    public function render()
    {
        return view('pages.feed')
            ->layout('layouts.app', [
                'title' => 'Beranda'
            ]);
    }
}