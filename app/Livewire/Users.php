<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Users Page')]
class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }
}
