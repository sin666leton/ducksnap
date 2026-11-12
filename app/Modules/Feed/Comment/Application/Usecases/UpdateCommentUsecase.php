<?php

namespace App\Modules\Feed\Comment\Application\Usecases;

use App\Modules\Feed\Comment\Application\DTOs\UpdateCommentCommand;
use App\Modules\Feed\Comment\Infrastructure\Repositories\CommentRepository;

class UpdateCommentUsecase
{
    public function __construct(
        private CommentRepository $repo
    ) {}

    public function handle(UpdateCommentCommand $command)
    {
        $res = (bool) $this->repo->update($command);

        return $res;
    }
}