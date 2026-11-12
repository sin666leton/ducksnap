<?php

namespace App\Modules\Feed\Post\Application\Usecase;

use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
use App\Modules\Feed\Post\Infrastructure\Repositories\PostRepository;
use App\Modules\Feed\Shared\DTOs\CommentDTO;
use Carbon\Carbon;

class GetPostWithCommentUsecase
{
    public function __construct(
        private PostRepository $repo
    ) {
    }

    public function handle(int|null $userId = null)
    {
        $result = $this->repo->getWithComment($userId);

        return $result->map(function ($post) {
            return new PostWithCommentsDTO(
                $post->user->id,
                $post->user->avatar,
                $post->user->name,
                $post->id,
                $post->content,
                $post->image,
                Carbon::parse($post->created_at)->format('d-m-Y H:i'),
                $post->totalLikes,
                $post->totalComments,
                $post->comments->map(function ($comment) {
                    return new CommentDTO(
                        $comment->user->id,
                        $comment->user->avatar,
                        $comment->user->name,
                        $comment->id,
                        $comment->created_at,
                        $comment->comment,
                        $comment->image,
                    );
                })
                    ->toArray()
            );
        });
    }
}