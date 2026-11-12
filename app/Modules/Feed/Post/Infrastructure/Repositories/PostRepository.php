<?php

namespace App\Modules\Feed\Post\Infrastructure\Repositories;

use App\Models\Post;
use App\Modules\Feed\Post\Application\DTOs\CreatePostCommand;

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

    public function getWithComment()
    {
        return Post::with([
            'comments' => function ($comment) {
                $comment
                    ->with('user')
                    ->first();
            },
            'user' => function ($user) {
                $user->select(['avatar', 'name', 'id']);
            }
        ])
            ->orderByDesc('created_at')
            ->get();
    }
}