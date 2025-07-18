<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;

class UserList extends Component
{
    use WithPagination, WithFileUploads;

    public $title = 'User Component Data';
    public $query = '';

    #[On('user-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
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

        $this->resetPage();
    }

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholders.skeleton-list', $params);
    }

    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::latest()
                ->where('name', 'like', "%{$this->query}%")
                ->paginate(4),
            'userCount' => count(User::all())
        ]);
    }
}
