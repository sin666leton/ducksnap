<?php

namespace App\Modules\User\Register\Infrastructure\Pages;

use Livewire\Component;

class RegisterPage extends Component
{
    public function render()
    {
        return view('pages.register', [
            'siteName' => env('APP_NAME')
        ])
        ->layout('layouts.app', [
            'title' => 'Daftar',
        ]);
    }
}