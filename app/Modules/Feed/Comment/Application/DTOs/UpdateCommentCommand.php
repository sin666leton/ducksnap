<?php

namespace App\Modules\Feed\Comment\Application\DTOs;

class UpdateCommentCommand
{
    public function __construct(
        public readonly int $commentId,
        public readonly int $userId,
        public readonly string $content
    ) {}
}