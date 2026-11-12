<?php

namespace App\Modules\Feed\Profile\Infrastructure\Pages;

use App\Modules\Feed\Post\Application\Usecase\GetPostWithCommentUsecase;
use App\Modules\Feed\Post\Application\Usecase\ShowPostUsecase;
use Livewire\Attributes\On;
use Livewire\Component;

class ProfilePage extends Component
{
    protected GetPostWithCommentUsecase $getPosts;

    public function boot(GetPostWithCommentUsecase $getPosts)
    {
        $this->getPosts = $getPosts;
    }

    #[On('post-created')]
    #[On('post-deleted')]
    public function refreshPost()
    {
    }

    public function render()
    {
        $user = auth()->user();

        return view('pages.profile', [
            'user' => $user,
            'posts' => $this->getPosts->handle($user->id)
        ])
            ->layout('layouts.app', [
                'title' => 'Profil name'
            ]);
    }
}