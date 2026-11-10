<?php

namespace App\Modules\Shared\Components\Layout;

use Illuminate\View\Component;

class MainLayout extends Component
{
    public function render()
    {
        return view('layouts.main');
    }
}