<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactPerson;
use Livewire\Component;

class Person extends Component
{
    public $name, $surname;
    public $choices;
    public $other;
    public $parentId;

    protected $rules = [
        'name' => 'required|min:2|max:50',
        'surname' => 'required|min:2|max:50',
        'other' => 'nullable',
        'choices' => 'required',
    ];

    protected $listeners = ['getParentId'];

    public function render()
    {
        return view('livewire.contact.person')->layout('layouts.contact');
    }

    public function submit()
    {
        $this->validate();

        ContactPerson::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'other' => $this->other,
            'choices' => $this->choices,
            'contact_general_id' => $this->parentId,
        ]);

        $this->emit('stepEvent', 3);
    }

    public function getParentId($id)
    {
        $this->parentId = $id;
    }
}
