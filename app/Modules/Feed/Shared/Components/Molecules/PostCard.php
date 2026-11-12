<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use App\Models\Post;
use App\Models\User;
use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
use App\Modules\Feed\Post\Application\DTOs\UpdatePostCommand;
use App\Modules\Feed\Post\Application\Usecase\DeletePostUsecase;
use App\Modules\Feed\Post\Application\Usecase\UpdatePostUsecase;
use Livewire\Component;

class PostCard extends Component
{
    public $authorId;

    public string $authorAvatar;

    public string $authorName;

    public $postId;

    public string $postContent;

    public string|null $postImage;

    public string $postCreated;

    public string $totalLikes;

    public string $totalComments;

    public int $showDropdown = 0;

    public int $editMode = 0;

    public string $editedContent = '';

    public bool $redirectAfterDelete = false;

    protected DeletePostUsecase $deletePost;

    protected UpdatePostUsecase $updatePost;

    public function boot(DeletePostUsecase $deleteUsecase, UpdatePostUsecase $updateUsecase)
    {
        $this->deletePost = $deleteUsecase;
        $this->editedContent = $this->postContent;
        $this->updatePost = $updateUsecase;
    }

    public function updatePost()
    {
        try {
            $this->updatePost->handle(new UpdatePostCommand(
                $this->postId,
                auth()->user()->id,
                $this->editedContent
            ));

            $this->postContent = $this->editedContent;
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            $this->toggleEdit();
        }
    }

    public function toggleEdit()
    {
        if ($this->editMode > 0) {
            $this->editMode = 0;
            $this->editedContent = $this->postContent;
        } else {
            $this->editMode = 1;
            $this->showDropdown = 0;
        }
    }

    public function delete()
    {
        $this->deletePost->handle($this->postId, auth()->user()->id);

        $this->dispatch('post-deleted');
        if ($this->redirectAfterDelete) {
            return $this->redirect(route('feed'), true);
        }
    }

    public function toggleDropdown()
    {
        $this->showDropdown = ($this->showDropdown > 0 ? 0 : 1);
    }

    public function render()
    {
        return view('components.molecules.post-card');
    }
}