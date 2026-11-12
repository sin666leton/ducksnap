<?php

namespace App\Modules\Feed\Post\Application\DTOs;

class PostWithCommentsDTO
{
    public function __construct(
        public readonly int $authorId,
        public readonly string $authorAvatar,
        public readonly string $authorName,
        public readonly int $postId,
        public readonly string $postContent,
        public readonly string $postCreated
    ) {}
}