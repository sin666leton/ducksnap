<?php

namespace App\Modules\Feed\Comment\Application\Usecases;

use App\Modules\Feed\Comment\Infrastructure\Repositories\CommentRepository;

class DeleteCommentUsecase
{
    public function __construct(
        private CommentRepository $repo
    ) {}

    public function handle(int $commentId, int $userId)
    {
        $this->repo->delete($commentId, $userId);
    }
}