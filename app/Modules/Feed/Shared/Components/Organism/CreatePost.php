<?php

namespace App\Modules\Feed\Shared\Components\Organism;

use App\Modules\Feed\Post\Application\DTOs\CreatePostCommand;
use App\Modules\Feed\Post\Application\Usecase\CreatePostUsecase;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $content = '';

    public $image;

    public function submit(CreatePostUsecase $post)
    {
        $this->validate([
            'content' => 'nullable|string|required_without:image',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|required_without:content'
        ]);

        try {
            $post->handle(new CreatePostCommand(
                auth()->user()->id,
                $this->content,
                $this->image ? $this->image->store('images', 'public') : null
            ));

            $this->reset(['content', 'image']);

            $this->dispatch('post-created');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('components.organism.create-post', [
            'user' => auth()->user()
        ]);
    }
}