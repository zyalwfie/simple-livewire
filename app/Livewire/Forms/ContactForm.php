<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate('required|email:dns')]
    public $email = '';

    #[Validate('required|min:3|max:255')]
    public $subject = '';

    #[Validate('required|min:3|max:255')]
    public $message = '';

    public function store()
    {
        $this->validate();

        Contact::insert($this->all());

        $this->reset();
    }
}
