<?php

use App\Modules\Post\Home\Infrastructure\Components\Pages\DashboardPage;
use Illuminate\Support\Facades\Route;

Route::livewire('/', DashboardPage::class);
