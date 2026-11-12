<?php

namespace App\Modules\Feed\Post\Infrastructure\Pages;

use Livewire\Component;

class ShowPostPage extends Component
{
    public function render()
    {
        return view('pages.show-post')
            ->layout('layouts.app', [
                'title' => 'Postingan oleh Nama'
            ]);
    }
}