<?php

namespace App\Modules\Feed\Comment\Application\DTOs;

class CreateCommentCommand
{
    public function __construct(
        public int $userId,
        public int $postId,
        public string $content,
        public string|null $pathFile
    ) {}
}