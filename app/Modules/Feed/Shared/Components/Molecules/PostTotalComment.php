<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use App\Modules\Feed\Shared\Service\GetPostTotalCommentService;
use Livewire\Attributes\On;
use Livewire\Component;

class PostTotalComment extends Component
{
    public $postId;

    protected GetPostTotalCommentService $service;

    public function boot(GetPostTotalCommentService $service)
    {
        $this->service = $service;
    }

    #[On('comment-created')]
    #[On('comment-deleted')]
    public function refreshTotalComments()
    {

    }

    public function render()
    {
        $res = $this->service->handle(intval($this->postId));

        return view('components.molecules.post-comment', [
            'totalComments' => $res
        ]);
    }
}