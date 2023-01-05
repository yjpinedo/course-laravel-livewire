<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactDetail;
use Livewire\Component;

class Detail extends Component
{
    public $text, $parentId;

    protected $rules = [
        'text' => 'required|min:3|max:255',
    ];

    protected $listeners = ['getParentId'];

    public function render()
    {
        return view('livewire.contact.detail')->layout('layouts.contact');
    }

    public function submit()
    {
        $this->validate();

        ContactDetail::create([
            'text' => $this->text,
            'contact_general_id' => $this->parentId,
        ]);

        $this->emit('stepEvent', 1);
    }

    public function getParentId($id)
    {
        $this->parentId = $id;
    }
}
