<?php

namespace App\Modules\User\Shared\Components;

use App\Modules\User\Login\Application\Usecases\LoginUsecase;
use App\Modules\User\Register\Application\DTOs\CreateUserCommand;
use App\Modules\User\Register\Application\Exceptions\EmailAlreadyRegisteredException;
use App\Modules\User\Register\Application\Usecases\RegisterUsecase;
use Livewire\Component;

class FormAuth extends Component
{
    public string $mode = 'login';

    public string $username = '';

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $confirmPassword = '';

    public $showPassword = 0;
    public $showConfirmPassword = 0;

    protected LoginUsecase $loginUsecase;

    protected RegisterUsecase $registerUsecase;

    public function boot(LoginUsecase $login, RegisterUsecase $register)
    {
        $this->loginUsecase = $login;
        $this->registerUsecase = $register;
    }

    public function toggleShowPassword()
    {
        $this->showPassword = ($this->showPassword > 0 ? 0 : 1);
    }


    public function toggleShowConfirmPassword()
    {
        $this->showConfirmPassword = ($this->showConfirmPassword > 0 ? 0 : 1);
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
        try {
            $this->loginUsecase->handle($validated['email'], $validated['password']);

            return $this->redirectIntended(route('feed'), true);
        } catch (\Throwable $th) {
            $this->addError('errors', $th->getMessage());

            $this->password = '';
        }
    }

    protected function register()
    {
        $validated = $this->validation();

        try {
            $this->registerUsecase->handle(new CreateUserCommand(
                $validated['username'],
                $validated['name'],
                $validated['email'],
                $validated['password']
            ));

            return $this->redirectIntended(route('feed'), true);
        } catch (\Throwable $th) {
            if ($th instanceof EmailAlreadyRegisteredException) {
                $this->addError('email', $th->getMessage());
            } else {
                $this->addError('errors', $th->getMessage());
            }
            $this->password = '';
            $this->confirmPassword = '';
        }
    }

    protected function validation()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string'
        ];

        if ($this->mode == 'register') {
            $rules['name'] = 'required|string|min:3';
            $rules['password'] = 'required|string|min:6';
            $rules['username'] = 'required|string|min:3';
            $rules['confirmPassword'] = 'required|same:password';
        }

        return $this->validate($rules);
    }

    public function render()
    {
        return view('components.organism.form-auth');
    }
}