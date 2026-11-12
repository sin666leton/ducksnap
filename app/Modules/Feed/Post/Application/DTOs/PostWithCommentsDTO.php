<?php

namespace App\Modules\Feed\Post\Application\DTOs;

use App\Modules\Feed\Shared\DTOs\CommentDTO;

class PostWithCommentsDTO
{
    public function __construct(
        public readonly int $authorId,
        public readonly string $authorAvatar,
        public readonly string $authorName,
        public readonly int $postId,
        public readonly string $postContent,
        public readonly string|null $postImage,
        public readonly string $postCreated,
        /**
         * @var CommentDTO[]
         */
        public readonly array|null $comments
    ) {
    }
}