<?php

namespace App\Modules\User\Shared\Components;

use Livewire\Component;

class FormAuth extends Component
{
    public string $mode = 'login';

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public $showPassword = 0;

    public function boot()
    {
        // Dependency Injection
    }

    public function toggleShowPassword()
    {
        $this->showPassword = ($this->showPassword > 0 ? 0 : 1);
    }

    public function submit()
    {
        switch ($this->mode) {
            case 'register':
                return $this->register();

            default:
                return $this->login();
        }
    }

    protected function login()
    {
        $validated = $this->validation();

        return $this->redirectIntended(route('feed'), true);
    }

    protected function register()
    {
        $validated = $this->validation();

        return $this->redirectIntended(route('feed'), true);
    }

    protected function validation()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string'
        ];

        if ($this->mode == 'register') {
            $rules['name'] = 'required|string|min:3';
            $rules['password'] = 'required|string|min:8';
            $rules['username'] = 'required|string|min:3';
        }

        return $this->validate($rules);
    }

    public function render()
    {
        return view('components.organism.form-auth');
    }
}