<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $title, $text, $category;
    public $image;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'text' => 'min:3|max:255',
        'image' => 'nullable|image'
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
            $this->category = Category::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text,
            ]);
        }

        if ($this->image) {
            $imageName = $this->category->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('image/categories', $imageName, 'public_upload');
            $this->category->update([
                'image' => $imageName,
            ]);
        }

        $this->emit('created');
    }
}
