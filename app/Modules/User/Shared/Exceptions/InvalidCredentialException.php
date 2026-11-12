<?php

namespace App\Modules\User\Shared\Exceptions;

use Exception;

class InvalidCredentialException extends Exception
{
    public function __construct()
    {
        parent::__construct('Email atau Password salah', 401);
    }
}