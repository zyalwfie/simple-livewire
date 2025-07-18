<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('About Page')]
class About extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div class="text-3xl font-bold text-center mt-22">
            <h1>About Page</h1>
        </div>
        HTML;
    }
}
