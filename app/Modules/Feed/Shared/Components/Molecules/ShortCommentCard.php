<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use Livewire\Component;

class ShortCommentCard extends Component
{

    public $authorId;
    
    public string $authorName;
    
    public string $authorAvatar;

    public string|null $commentContent;

    public string|null $commentImage;

    public string $commentCreated;
    
    public function render()
    {
        return view('components.molecules.short-comment-card');
    }
}