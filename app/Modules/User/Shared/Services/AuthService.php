<?php

namespace App\Modules\User\Shared\Services;

use App\Modules\User\Shared\Exceptions\InvalidCredentialException;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function handle(string $email, string $password)
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {

            throw new InvalidCredentialException();
        }
    }
}