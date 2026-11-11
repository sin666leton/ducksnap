<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use App\Models\Post;
use App\Models\User;
use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
use Livewire\Component;

class PostCard extends Component
{
    public function render()
    {
        $user = User::factory()
            ->makeOne();
        $post = Post::factory()
            ->for($user)
            ->makeOne();

        $dto = new PostWithCommentsDTO(
            $user->id ?? 1,
            $user->avatar,
            $user->name,
            $post->id ?? 1,
            $post->content,
            $post->created_at ?? now()
        );

        return view('components.molecules.post-card', [
            'post' => $dto
        ]);
    }
}