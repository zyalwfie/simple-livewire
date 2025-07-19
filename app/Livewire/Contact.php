<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact as ContactModel;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Contact Page')]
class Contact extends Component
{
    public ContactForm $form;

    public function createNewMessage()
    {
        $this->form->store();

        session()->flash('success', 'New message has been created.');
    }
}
