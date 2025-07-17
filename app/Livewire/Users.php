<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithFileUploads;

    public $title = 'User Component Data', $users;

    #[Validate('required|min:3|max:255')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    #[Validate('image|max:2048')]
    public $avatar;

    public function __construct()
    {
        $this->users = User::latest()->get();
    }

    public function createNewUser()
    {
        // $validated = $this->validate([
        //     'name' => 'required|min:3|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:8'
        // ]);

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
    }

    public function generateRandomUser()
    {
        User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }

    public function render()
    {
        return view('livewire.users');
    }
}
