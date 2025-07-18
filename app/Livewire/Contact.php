<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Contact Page')]
class Contact extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div class="text-3xl font-bold text-center mt-22">
            <h1>Contact Page</h1>
        </div>
        HTML;
    }
}
