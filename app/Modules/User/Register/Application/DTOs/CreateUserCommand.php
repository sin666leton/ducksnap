<?php

namespace App\Modules\User\Register\Application\DTOs;

class CreateUserCommand
{
    public function __construct(
        public readonly string $username,
        public readonly string $fullName,
        public readonly string $email,
        public readonly string $password,
    ) {
    }
}