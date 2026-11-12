<?php

namespace App\Modules\Feed\Post\Application\Usecase;

use App\Modules\Feed\Post\Application\DTOs\CreatePostCommand;
use App\Modules\Feed\Post\Infrastructure\Repositories\PostRepository;

class CreatePostUsecase
{
    public function __construct(
        private PostRepository $repo
    ) {
    }

    public function handle(CreatePostCommand $command)
    {
        $this->repo->create($command);
    }
}