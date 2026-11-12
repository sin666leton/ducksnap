<?php

namespace App\Modules\Feed\Shared\Components\Molecules;

use Illuminate\View\Component;


class CommentCard extends Component
{
    public function render()
    {
        return view('components.molecules.comment-card');
    }
}