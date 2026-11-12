<?php

namespace App\Modules\Feed\Post\Application\Usecase;

use App\Modules\Feed\Post\Application\DTOs\UpdatePostCommand;
use App\Modules\Feed\Post\Infrastructure\Repositories\PostRepository;

class UpdatePostUsecase
{
    public function __construct(
        private PostRepository $repo
    ) {}

    public function handle(UpdatePostCommand $command)
    {
        $res = (bool) $this->repo->update($command);

        return $res;
    }
}