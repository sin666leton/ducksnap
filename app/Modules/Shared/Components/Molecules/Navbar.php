<?php

namespace App\Modules\Shared\Components\Molecules;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('components.molecules.navbar', [
            'siteName' => env('APP_NAME').".",
            'nav' => [

            ]
        ]);
    }
}