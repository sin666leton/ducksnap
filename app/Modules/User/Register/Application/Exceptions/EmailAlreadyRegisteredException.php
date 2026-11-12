<?php

namespace App\Modules\User\Register\Application\Exceptions;

use Exception;

class EmailAlreadyRegisteredException extends Exception
{
    public function __construct(string $email = "")
    {
        parent::__construct("Email $email telah terdaftar.", 409);
    }
}