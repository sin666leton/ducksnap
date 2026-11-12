<?php

namespace App\Modules\Feed\Shared\Components\Organism;

use App\Modules\Feed\Comment\Application\DTOs\CreateCommentCommand;
use App\Modules\Feed\Comment\Application\Usecases\CreateCommentUsecase;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateComment extends Component
{
    use WithFileUploads;

    public $postId;

    public $content = '';

    public $image;

    public function submit(CreateCommentUsecase $comment)
    {
        $this->validate([
            'postId' => 'required',
            'content' => 'nullable|string|required_without:image',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|required_without:content'
        ]);

        try {
            $comment->handle(new CreateCommentCommand(
                auth()->user()->id,
                intval($this->postId),
                $this->content,
                $this->image ? $this->image->store('images', 'public') : null
            ));

            $this->reset(['content', 'image']);

            $this->dispatch('comment-created');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {

        return view('components.organism.create-comment', [
            'user' => auth()->user()
        ]);
    }
}