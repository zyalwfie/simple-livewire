<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $title = 'User Component Data', $users;

    public function __construct()
    {
        $this->users = User::all();
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
