<?php

namespace App\Modules\User\Profile\Application\DTOs;

class UpdateUserCommand
{
    public function __construct(
        public readonly int $id,
        public readonly string $avatar,
        public readonly string|null $bio,
        public readonly string $username,
        public readonly string $name,
        public readonly string|null $newPassword
    ) {}
}