<?php

namespace App\Modules\Feed\Shared\DTOs;

class CommentDTO
{
    public function __construct(
        public readonly int $authorId,
        public readonly string $authorAvatar,
        public readonly string $authorName,
        public readonly string $commentId,
        public readonly string $commentCreated,
        public readonly string|null $commentContent,
        public readonly string|null $commentImage
    ) {
    }
}