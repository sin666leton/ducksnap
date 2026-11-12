<?php

namespace App\Modules\Feed\Comment\Infrastructure\Repositories;

use App\Models\Comment;
use App\Modules\Feed\Comment\Application\DTOs\CreateCommentCommand;
use App\Modules\Feed\Comment\Application\DTOs\UpdateCommentCommand;

class CommentRepository
{
    public function create(CreateCommentCommand $command)
    {
        return Comment::create([
            'post_id' => $command->postId,
            'user_id' => $command->userId,
            'comment' => $command->content,
            'image' => $command->pathFile
        ]);
    }
    
    public function getComments(int $postId)
    {
        $comments = Comment::with(['user' => function ($user) {
            return $user->select(['id', 'name', 'avatar']);
        }])
        ->where('post_id', $postId)
        ->orderByDesc('created_at')
        ->get();

        return $comments;
    }

    public function update(UpdateCommentCommand $command)
    {
        return Comment::where('id', $command->commentId)
            ->where('user_id', $command->userId)
            ->update([
                'comment' => $command->content
            ]);
    }

    public function delete(int $commentId, int $userId)
    {
        Comment::where('id', $commentId)
            ->where('user_id', $userId)
            ->delete();
    }
}