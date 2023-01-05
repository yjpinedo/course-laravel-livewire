<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactGeneral;
use Livewire\Component;

class General extends Component
{
    public $subject;
    public $message;
    public $type;
    public $step = 1;
    public $key;

    protected $rules = [
        'subject' => 'required|min:2|max:255',
        'message' => 'required|min:2',
        'type' => 'required',
    ];

    protected $listeners = ['stepEvent'];

    public function render()
    {
        return view('livewire.contact.general')->layout('layouts.contact');
    }

    public function submit()
    {
        $this->validate();

        $contactGeneral = ContactGeneral::create([
            'subject' => $this->subject,
            'message' => $this->message,
            'type' => $this->type,
        ]);

        $this->key = $contactGeneral->id;

        $this->stepEvent(2);
    }

    public function stepEvent($step)
    {
        if ($step == 2) {
            $step = $this->type == 'company' ? 2.1 : 2.2;
        }
        $this->step = $step;

        $this->emit('getParentId', $this->key);
    }
}
