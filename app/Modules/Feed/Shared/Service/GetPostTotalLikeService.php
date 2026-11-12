<?php

namespace App\Modules\Feed\Shared\Service;

use App\Models\Post;
use App\Modules\Feed\Shared\Exceptions\FeedNotFoundException;

class GetPostTotalLikeService
{
    public function handle(int $postId, int $userId)
    {
        $result = Post::withCount('likedByUsers as totalLikes')
            ->withExists([
                'likedByUsers as isLiked' => fn ($q) => $q->where('users.id', $userId),
            ])
            ->find($postId);

        return $result;
    }
}