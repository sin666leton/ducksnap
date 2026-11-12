<?php

namespace App\Modules\User\Register\Application\Usecases;

use App\Modules\User\Register\Application\DTOs\CreateUserCommand;
use App\Modules\User\Register\Application\Exceptions\EmailAlreadyRegisteredException;
use App\Modules\User\Register\Infrastructure\Repositories\RegisterRepository;
use App\Modules\User\Shared\Services\AuthService;

class RegisterUsecase
{
    public function __construct(
        private AuthService $auth,
        private RegisterRepository $repo
    ) {
    }

    public function handle(CreateUserCommand $command)
    {
        if ($this->repo->existsByEmail($command->email))
            throw new EmailAlreadyRegisteredException($command->email);

        $this->repo->create($command);

        $this->auth->handle($command->email, $command->password);
    }
}