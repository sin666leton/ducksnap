<?php

namespace App\Providers;

use App\Modules\Feed\Shared\Components\Molecules\CommentCard;
use App\Modules\Feed\Shared\Components\Molecules\PostCard;
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
        Blade::component(CommentCard::class, 'comment-card');

        // Organism
        Livewire::component('form-auth', FormAuth::class);
    }
}
