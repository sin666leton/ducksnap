<?php

namespace App\Modules\Feed\Comment\Application\Usecases;

use App\Modules\Feed\Comment\Infrastructure\Repositories\CommentRepository;
use App\Modules\Feed\Shared\DTOs\CommentDTO;
use Carbon\Carbon;

class GetCommentUsecase
{
    public function __construct(
        private CommentRepository $repo
    ) {}

    public function handle(int $postId)
    {
        $result = $this->repo->getComments($postId);

        return $result->map(function ($comment) {
            return new CommentDTO(
                $comment->user->id,
                $comment->user->avatar,
                $comment->user->name,
                $comment->id,
                Carbon::parse($comment->created_at)->format('d-m-Y H:i'),
                $comment->comment,
                $comment->image
            );
        })
        ->toArray();
    }
}