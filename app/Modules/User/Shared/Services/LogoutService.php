<?php

namespace App\Modules\User\Shared\Services;

use Illuminate\Support\Facades\Auth;

class LogoutService
{
    public function handle()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();
    }
}