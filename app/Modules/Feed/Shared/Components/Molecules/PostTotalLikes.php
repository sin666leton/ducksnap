<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use App\Modules\Feed\Shared\Service\GetPostTotalLikeService;
use App\Modules\Feed\Shared\Service\ToggleLikeService;
use Livewire\Component;

class PostTotalLikes extends Component
{
    public $postId;

    protected GetPostTotalLikeService $service;

    protected ToggleLikeService $likeService;

    public bool $isLiked = false;
    public int $totalLikes = 0;

    public function boot(GetPostTotalLikeService $service, ToggleLikeService $toggle)
    {
        $this->service = $service;
        $this->likeService = $toggle;
    }

    public function mount()
    {
        $res = $this->service->handle($this->postId, auth()->id());

        $this->isLiked    = (bool) $res->isLiked;
        $this->totalLikes = (int) $res->totalLikes;
    }

    public function toggle()
    {
        $result = $this->likeService->handle($this->postId, auth()->id());

        $this->isLiked    = $result;

        if ($result) {
            $this->totalLikes+=1;
        } else {
            $this->totalLikes-=1;
        }
    }

    public function render()
    {
        $res = $this->service->handle(intval($this->postId), auth()->user()->id);

        return view('components.molecules.post-like', [
            'totalLikes' => $res->totalLikes,
            'isLiked' => $res->isLiked
        ]);
    }
}