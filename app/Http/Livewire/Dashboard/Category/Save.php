<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class Save extends Component
{
    public $title, $text;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'text' => 'min:3|max:255'
    ];

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {

        $this->validate();

        Category::create([
            'title' => $this->title,
            'slug' => str($this->title)->slug(),
            'text' => $this->text,
        ]);
    }
}
