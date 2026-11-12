<?php

namespace App\Modules\Feed\Shared\Components\Organism;

use App\Modules\Feed\Comment\Application\Usecases\GetCommentUsecase;
use Livewire\Attributes\On;
use Livewire\Component;

class ListComment extends Component
{
    public $postId;

    #[On('comment-created')]
    #[On('comment-deleted')]
    public function refreshComment() 
    {

    }

    public function render(GetCommentUsecase $usecase)
    {
        $res = $usecase->handle(intval($this->postId));

        return view('components.organism.list-comment', [
            'comments' => $res
        ]);
    }
}