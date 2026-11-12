<?php

namespace App\Modules\Shared\Components\Molecules;

use Livewire\Component;

class Navbar extends Component
{
    public $showDropdown = 0;

    public function toggleDropdown()
    {
        $this->showDropdown = ($this->showDropdown > 0 ? 0 : 1);
    }

    public function logout()
    {
        return $this->redirect(route('login'), true);
    }

    public function render()
    {
        return view('components.molecules.navbar', [
            'siteName' => env('APP_NAME') . ".",
            'nav' => [

            ]
        ]);
    }
}