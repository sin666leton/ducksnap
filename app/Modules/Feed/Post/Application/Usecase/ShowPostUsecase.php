<?php

namespace App\Modules\Feed\Post\Application\Usecase;

use App\Modules\Feed\Post\Application\DTOs\PostDTO;
use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
use App\Modules\Feed\Post\Infrastructure\Repositories\PostRepository;
use App\Modules\Feed\Shared\DTOs\CommentDTO;
use App\Modules\Feed\Shared\Exceptions\FeedNotFoundException;
use Carbon\Carbon;

class ShowPostUsecase
{
    public function __construct(
        private PostRepository $repo
    ) {}

    public function handle(int $id)
    {
        $post = $this->repo->find($id);

        if (!$post) throw new FeedNotFoundException();

        return new PostDTO(
            $post->user->id,
            $post->user->avatar,
            $post->user->name,
            $post->id,
            $post->content,
            $post->image,
            Carbon::parse($post->created_at)->format('d-m-Y H:i')
        );
    }
}