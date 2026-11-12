<?php

namespace App\Modules\Feed\Post\Infrastructure\Pages;

use App\Modules\Feed\Post\Application\Usecase\ShowPostUsecase;
use Livewire\Component;

class ShowPostPage extends Component
{
    public int $id;

    public function mount(string $id)
    {
        $this->id = intval($id);
    }

    public function render(ShowPostUsecase $usecase)
    {
        $post = $usecase->handle($this->id);

        return view('pages.show-post', [
            'post' => $post
        ])
            ->layout('layouts.app', [
                'title' => 'Postingan oleh Nama'
            ]);
    }
}