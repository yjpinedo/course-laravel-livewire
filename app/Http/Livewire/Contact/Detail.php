<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactDetail;
use Livewire\Component;

class Detail extends Component
{
    public $text;

    protected $rules = [
        'text' => 'required|min:3|max:255',
    ];

    public function render()
    {
        return view('livewire.contact.detail');
    }

    public function submit()
    {
        $this->validate();

        ContactDetail::create([
            'text' => $this->text,
            'contact_general_id' => 1,
        ]);

    }
}
