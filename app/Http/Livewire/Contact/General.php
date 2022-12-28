<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactGeneral;
use Livewire\Component;

class General extends Component
{
    public $subject;
    public $message;
    public $type;

    protected $rules = [
        'subject' => 'required|min:2|max:255',
        'message' => 'required|min:2',
        'type' => 'required',
    ];

    public function render()
    {
        return view('livewire.contact.general');
    }

    public function submit()
    {
        $this->validate();

        ContactGeneral::create([
            'subject' => $this->subject,
            'message' => $this->message,
            'type' => $this->type,
        ]);
    }
}
