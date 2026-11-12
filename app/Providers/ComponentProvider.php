<?php

namespace App\Providers;

use App\Modules\Feed\Shared\Components\Molecules\CommentCard;
use App\Modules\Feed\Shared\Components\Molecules\PostCard;
use App\Modules\Feed\Shared\Components\Molecules\PostTotalComment;
use App\Modules\Feed\Shared\Components\Molecules\PostTotalLikes;
use App\Modules\Feed\Shared\Components\Molecules\ShortCommentCard;
use App\Modules\Feed\Shared\Components\Organism\CreateComment;
use App\Modules\Feed\Shared\Components\Organism\CreatePost;
use App\Modules\Feed\Shared\Components\Organism\ListComment;
use App\Modules\Shared\Components\Layout\MainLayout;
use App\Modules\Shared\Components\Molecules\Navbar;
use App\Modules\User\Shared\Components\FormAuth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ComponentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Livewire::addLocation(classNamespace: 'App\\Modules');

        // Layout
        Blade::component(MainLayout::class, 'layout-main');

        // Molecules
        Livewire::component('navbar', Navbar::class);
        Livewire::component('post-card', PostCard::class);
        LiveWire::component('comment-card', CommentCard::class);
        Livewire::component('short-comment-card', ShortCommentCard::class);
        Livewire::component('post-comment', PostTotalComment::class);
        Livewire::component('post-like', PostTotalLikes::class);

        // Organism
        Livewire::component('form-auth', FormAuth::class);
        Livewire::component('create-post', CreatePost::class);
        Livewire::component('create-comment', CreateComment::class);
        Livewire::component('list-comment', ListComment::class);
    }
}
