<?php

namespace App\Modules\Feed\Shared\Service;

use App\Models\Post;
use App\Modules\Feed\Shared\Exceptions\FeedNotFoundException;

class ToggleLikeService
{
    public function handle(int $postId, int $userId)
    {
        $post = Post::where('id', $postId)->first();

        if (!$post) throw new FeedNotFoundException();

        $result = $post->likedByUsers()->toggle($userId);

        return count($result['attached']) > 0;
    }
}