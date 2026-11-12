<?php

namespace App\Modules\Feed\Profile\Infrastructure\Pages;

use Livewire\Component;

class ProfilePage extends Component
{
    public function render()
    {
        return view('pages.profile')
            ->layout('layouts.app', [
                'title' => 'Profil name'
            ]);
    }
}