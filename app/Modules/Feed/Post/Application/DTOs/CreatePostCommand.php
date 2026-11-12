<?php

namespace App\Modules\Feed\Post\Application\DTOs;

class CreatePostCommand
{
    public function __construct(
        public int $userId,
        public string $content,
        public string|null $pathFile
    ) {
    }
}