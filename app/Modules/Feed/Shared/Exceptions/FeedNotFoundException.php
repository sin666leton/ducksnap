<?php

namespace App\Modules\Feed\Shared\Exceptions;

use Exception;

class FeedNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct('Postingan tidak ditemukan', 404);
    }
}