<?php

namespace App\Modules\Feed\Post\Application\DTOs;

class UpdatePostCommand
{
    public function __construct(
        public readonly int $postId,
        public readonly int $userId,
        public readonly string $content
    ) {}
}