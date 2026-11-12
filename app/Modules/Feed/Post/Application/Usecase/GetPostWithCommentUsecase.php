<?php

namespace App\Modules\Feed\Post\Application\Usecase;

use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
use App\Modules\Feed\Post\Infrastructure\Repositories\PostRepository;
use App\Modules\Feed\Shared\DTOs\CommentDTO;

class GetPostWithCommentUsecase
{
    public function __construct(
        private PostRepository $repo
    ) {
    }

    public function handle()
    {
        $result = $this->repo->getWithComment();

        return $result->map(function ($post) {
            return new PostWithCommentsDTO(
                $post->user->id,
                $post->user->avatar,
                $post->user->name,
                $post->id,
                $post->content,
                $post->image,
                $post->created_at,
                $post->comments->map(function ($comment) {
                    return new CommentDTO(
                        $comment->user->id,
                        $comment->user->avatar,
                        $comment->user->name,
                        $comment->created_at,
                        $comment->content,
                        $comment->image
                    );
                })
                    ->toArray()
            );
        });
    }
}