<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use App\Models\Post;
use App\Models\User;
use App\Modules\Feed\Post\Application\DTOs\PostWithCommentsDTO;
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

    public function render()
    {
        return view('components.molecules.post-card');
    }
}