<?php

namespace App\Modules\Feed\Profile\Infrastructure\Pages;

use App\Modules\User\Profile\Application\DTOs\UpdateUserCommand;
use App\Modules\User\Shared\Services\UpdateUserService;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingPage extends Component
{
    use WithFileUploads;

    public $id;

    public string $name = '';

    public string $username = '';

    public ?string $bio = null;

    public ?string $currentAvatar = null; 

    public string $oldAvatar = '';

    public $avatar = null; // file upload sementara

    public string $oldPassword = '';

    public string $password = '';

    public string $password_confirmation = '';

    protected UpdateUserService $updateUser;
    
    public function mount(): void
    {
        $user = auth()->user();

        $this->id = $user->id;
        $this->name     = $user->name;
        $this->username = $user->username;
        $this->bio      = $user->bio;
        $this->oldAvatar   = $user->avatar;
    }

    public function boot(UpdateUserService $updateUser)
    {
        $this->updateUser = $updateUser;
    }

    public function updateUser()
    {
        $data = $this->validate([
            'name'      => ['required', 'string', 'min:3', 'max:50'],
            'username'  => [
                'required', 'string', 'min:3', 'max:30', 'alpha_dash',
                Rule::unique('users', 'username')->ignore(auth()->id()),
            ],
            'bio'       => ['nullable', 'string', 'max:160'],
            'avatar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            'oldPassword' => ['nullable', 'required_with:password', 'current_password'],
            'password'              => ['nullable', 'string', 'min:6', 'different:oldPassword'],
            'password_confirmation' => ['nullable', 'required_with:password', 'same:password'],
        ]);

        try {
            $this->updateUser->handle(new UpdateUserCommand(
                id:        auth()->user()->id,
                avatar:    $this->avatar ? $this->avatar->store('images', 'public') : null,
                bio:       $data['bio'],
                username:  $data['username'],
                name:      $data['name'],
                newPassword:  filled($data['password'] ?? null) ? $data['password'] : null,
            ));

            $this->dispatch('user-updated');
            $this->reset(['password', 'oldPassword', 'password_confirmation']);
    
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function render()
    {
        return view('pages.setting')
            ->layout('layouts.app', ['title' => 'Edit Profil']);
    }
}