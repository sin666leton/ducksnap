<?php

namespace App\Modules\User\Register\Infrastructure\Repositories;

use App\Models\User;
use App\Modules\User\Register\Application\DTOs\CreateUserCommand;
use Illuminate\Support\Facades\Storage;

class RegisterRepository
{
    public function existsByEmail($email): bool
    {
        return User::where('email', $email)->exists();
    }

    public function create(CreateUserCommand $command)
    {
        return User::create([
            'avatar' => '/assets/images/default-profile.webp',
            'username' => $command->username,
            'name' => $command->fullName,
            'email' => $command->email,
            'password' => $command->password
        ]);
    }
}