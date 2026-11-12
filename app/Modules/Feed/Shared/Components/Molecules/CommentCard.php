<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use App\Modules\Feed\Comment\Application\DTOs\UpdateCommentCommand;
use App\Modules\Feed\Comment\Application\Usecases\DeleteCommentUsecase;
use App\Modules\Feed\Comment\Application\Usecases\UpdateCommentUsecase;
use Livewire\Component;



class CommentCard extends Component
{
    public $authorId;
    
    public string $authorName;
    
    public string $authorAvatar;

    public $commentId;

    public string|null $commentContent;

    public string|null $commentImage;

    public string $commentCreated;

    public int $showDropdown = 0;

    public int $editMode = 0;

    public string $editedContent = '';

    protected DeleteCommentUsecase $deleteComment;

    protected UpdateCommentUsecase $updateComment;

    public function boot(DeleteCommentUsecase $delete, UpdateCommentUsecase $comment)
    {
        $this->deleteComment = $delete;
        $this->editedContent = $this->commentContent;
        $this->updateComment = $comment;
    }

    public function updateComment()
    {
        try {
            $this->updateComment->handle(new UpdateCommentCommand(
                $this->commentId,
                auth()->user()->id,
                $this->editedContent
            ));

            $this->commentContent = $this->editedContent;
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
            $this->editedContent = $this->commentContent;
        } else {
            $this->editMode = 1;
            $this->showDropdown = 0;
        }
    }

    public function delete()
    {
        $this->deleteComment->handle($this->commentId, auth()->user()->id);

        $this->dispatch('comment-deleted');
    }

    public function toggleDropdown()
    {
        $this->showDropdown = ($this->showDropdown > 0 ? 0 : 1);
    }

    public function render()
    {
        return view('components.molecules.comment-card');
    }
}