<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:255')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    #[Validate('image|max:2048')]
    public $avatar;

    public function createNewUser()
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('img', 'public');
        }

        User::create([
            'avatar' => $validated['avatar'] ?? 'default-avatar.png',
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        $this->reset();

        session()->flash('success', 'New user has been created.');

        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
