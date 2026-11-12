<?php

namespace App\Modules\User\Login\Application\Usecases;

use App\Modules\User\Shared\Services\AuthService;

class LoginUsecase
{
    public function __construct(
        private AuthService $auth
    ) {
    }

    public function handle(string $email, string $password)
    {
        $this->auth->handle($email, $password);
    }
}