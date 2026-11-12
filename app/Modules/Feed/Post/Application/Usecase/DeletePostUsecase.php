<?php

namespace App\Modules\Feed\Post\Application\Usecase;

use App\Modules\Feed\Post\Infrastructure\Repositories\PostRepository;

class DeletePostUsecase
{
    public function __construct(
        private PostRepository $repo
    ) {}

    public function handle(int $postId, int $userId)
    {
        $this->repo->delete($postId, $userId);
    }
}