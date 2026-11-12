<?php

namespace App\Modules\Feed\Post\Infrastructure\Repositories;

use App\Models\Post;
use App\Modules\Feed\Post\Application\DTOs\CreatePostCommand;
use App\Modules\Feed\Post\Application\DTOs\UpdatePostCommand;

class PostRepository
{
    public function create(CreatePostCommand $command)
    {
        return Post::create([
            'user_id' => $command->userId,
            'content' => $command->content,
            'image' => $command->pathFile
        ]);
    }

    public function getWithComment(int|null $userId = null)
    {
        $post = Post::with([
            'comments' => function ($comment) {
                $comment
                    ->with('user')
                    ->latest()
                    ->limit(1);
            },
            'user' => function ($user) {
                $user->select(['avatar', 'name', 'id']);
            }
        ]);

        if ($userId) $post->where('user_id', $userId);
        
        return $post->withCount(['comments as totalComments', 'likedByUsers as totalLikes'])
            ->orderByDesc('created_at')
            ->get();
    }

    public function find(int $postId)
    {
        return Post::with([
            'user' => function ($user) {
                $user->select(['avatar', 'name', 'id']);
            }
        ])
        ->where('id', $postId)
        ->first();
    }

    public function update(UpdatePostCommand $command)
    {
        return Post::where('id', $command->postId)
            ->where('user_id', $command->userId)
            ->update([
                'content' => $command->content
            ]);
    }

    public function delete(int $postId, int $userId)
    {
        return Post::where('id', $postId)
            ->where('user_id', $userId)
            ->delete();
    }
}