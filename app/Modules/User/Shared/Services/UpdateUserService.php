<?php

namespace App\Modules\User\Shared\Services;

use App\Models\User;
use App\Modules\User\Profile\Application\DTOs\UpdateUserCommand;

class UpdateUserService
{
    public function handle(UpdateUserCommand $command)
    {
        $user = User::findOrFail($command->id);

        $user->fill([
            'name'     => $command->name,
            'username' => $command->username,
            'bio'      => $command->bio,
        ]);

        if (filled($command->avatar)) $user->fill([
            'avatar' => $command->avatar
        ]);

        if (filled($command->newPassword)) {
            $user->password = $command->newPassword; // jangan Hash::make lagi
        }

        $user->save();
    }
}