<?php

namespace App\Modules\Shared\Components\Molecules;

use App\Modules\User\Shared\Services\LogoutService;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $showDropdown = 0;

    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    #[On('user-updated')]
    public function refreshNavbar()
    {

    }

    public function toggleDropdown()
    {
        $this->showDropdown = ($this->showDropdown > 0 ? 0 : 1);
    }

    public function logout(LogoutService $service)
    {
        $service->handle();

        return $this->redirect(route('login'), true);
    }

    public function render()
    {
        return view('components.molecules.navbar', [
            'siteName' => env('APP_NAME') . ".",
            'user' => $this->user,
            'nav' => [

            ]
        ]);
    }
}