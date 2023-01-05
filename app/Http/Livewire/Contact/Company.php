<?php

namespace App\Http\Livewire\Contact;

use App\Models\ContactCompany;
use Livewire\Component;

class Company extends Component
{
    public $name, $code, $email, $extra, $choices, $parentId;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'code' => 'required|min:2|max:50',
        'email' => 'required|email|unique:contact_companies,email',
        'extra' => 'required|min:2|max:205',
        'choices' => 'required',
    ];

    protected $listeners = ['getParentId'];

    public function render()
    {
        return view('livewire.contact.company')->layout('layouts.contact');
    }

    public function submit()
    {
        $this->validate();

        ContactCompany::create([
            'name' => $this->name,
            'code' => $this->code,
            'email' => $this->email,
            'extra' => $this->extra,
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
