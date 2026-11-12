<?php

namespace App\Modules\Feed\Comment\Application\Usecases;

use App\Modules\Feed\Comment\Application\DTOs\CreateCommentCommand;
use App\Modules\Feed\Comment\Infrastructure\Repositories\CommentRepository;

class CreateCommentUsecase
{
    public function __construct(
        private CommentRepository $repo
    ) {}

    public function handle(CreateCommentCommand $command)
    {
        $this->repo->create($command);
    }
}