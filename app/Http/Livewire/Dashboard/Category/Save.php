<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class Save extends Component
{
    public $title, $text, $category;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'text' => 'min:3|max:255'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->category = Category::findOrFail($id);
            $this->title = $this->category->title;
            $this->text = $this->category->text;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {

        $this->validate();

        if ($this->category) {
            $this->category->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text,
            ]);
        } else {
            Category::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text,
            ]);
        }
        $this->emit('created');

    }
}
