<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $title = 'User Component Data', $users, $name = '', $email = '', $password = '';

    public function __construct()
    {
        $this->users = User::latest()->get();
    }

    public function createNewUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);

        $this->reset();
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
