<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $title, $date, $image, $description, $text, $posted, $type, $category_id, $post;

    protected $rules = [
        'title' => 'required|min:2|max:255',
        'date' => 'required|date',
        'image' => 'nullable|image',
        'description' => 'required|min:2|max:500',
        'text' => 'nullable|min:2|max:500',
        'posted' => 'required|in:yes,not',
        'type' => 'required|in:adverd,post,course,movie',
        'category_id' => 'required',
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->post = Post::findOrFail($id);
            $this->title = $this->post->title;
            $this->date = $this->post->date;
            $this->description = $this->post->description;
            $this->text = $this->post->text;
            $this->posted = $this->post->posted;
            $this->type = $this->post->type;
            $this->category_id = $this->post->category_id;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.post.save', ['categories' => Category::all()]);
    }

    public function submit()
    {
        $this->validate();

        if ($this->post) {
            $this->post->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'date' => $this->date,
                'description' => $this->description,
                'text' => $this->text,
                'posted' => $this->posted,
                'type' => $this->type,
                'category_id' => $this->category_id,
            ]);
        } else {
            $this->post = Post::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'date' => $this->date,
                'description' => $this->description,
                'text' => $this->text,
                'posted' => $this->posted,
                'type' => $this->type,
                'category_id' => $this->category_id,
            ]);
        }

        if ($this->image) {
            $imageName = $this->post->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('image/posts', $imageName, 'public_upload');
            $this->post->update([
                'image' => $imageName,
            ]);
        }

        $this->emit('created');
    }
}
