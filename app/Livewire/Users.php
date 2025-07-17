<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $title = 'User Component Data', $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users');
    }
}
