<?php

use App\Modules\Feed\Post\Infrastructure\Pages\ShowPostPage;
use App\Modules\Feed\Profile\Infrastructure\Pages\ProfilePage;
use App\Modules\Feed\Shared\Pages\FeedPage;
use App\Modules\User\Login\Infrastructure\Pages\LoginPage;
use App\Modules\User\Register\Infrastructure\Pages\RegisterPage;
use Illuminate\Support\Facades\Route;

Route::livewire('/', LoginPage::class)->name('login');
Route::livewire('/beranda', FeedPage::class)->name('feed');
Route::livewire('/daftar', RegisterPage::class)->name('register');
Route::livewire('/postingan/{id}', ShowPostPage::class)->name('post.show');
Route::livewire('/pengguna/{id}', ProfilePage::class)->name('user.show');