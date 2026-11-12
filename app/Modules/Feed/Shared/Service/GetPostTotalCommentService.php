<?php

namespace App\Modules\Feed\Shared\Service;

use App\Models\Post;
use App\Modules\Feed\Shared\Exceptions\FeedNotFoundException;

class GetPostTotalCommentService
{
    public function handle(int $postId)
    {
        $post = Post::where('id', $postId)->first();

        if (!$post) throw new FeedNotFoundException();

        return $post->comments()->count();
    }
}