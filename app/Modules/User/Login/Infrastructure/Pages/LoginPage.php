<?php

namespace App\Modules\User\Login\Infrastructure\Pages;

use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('pages.login', [
            'siteName' => env('APP_NAME')
        ])
        ->layout('layouts.app', [
            'title' => 'Masuk'
        ]);
    }
}