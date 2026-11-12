<?php

namespace App\Modules\Feed\Shared\Pages;

use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
use App\Modules\Feed\Post\Application\Usecase\GetPostWithCommentUsecase;
use Livewire\Attributes\On;
use Livewire\Component;

class FeedPage extends Component
{
    /**
     * @var PostWithCommentsDTO[]
     */
    protected array $posts;

    protected GetPostWithCommentUsecase $usecase;

    public function boot(GetPostWithCommentUsecase $usecase)
    {
        $this->usecase = $usecase;
    }

    #[On('post-created')]
    public function refreshPost()
    {
    }

    public function render()
    {
        return view('pages.feed', [
            'posts' => $this->usecase->handle()
        ])
            ->layout('layouts.app', [
                'title' => 'Beranda'
            ]);
    }
}