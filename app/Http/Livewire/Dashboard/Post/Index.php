<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeletedPost;
    public $postToDelete;

    public function render()
    {
        return view('livewire.dashboard.post.index', ['posts' => Post::latest()->paginate(10)]);
    }

    public function selectPost(Post $post)
    {
        $this->postToDelete = $post;
        $this->confirmingDeletedPost = true;
    }

    public function delete()
    {
        $this->emit('deleted');
        $this->confirmingDeletedPost = false;
        $this->postToDelete->delete();
    }
}
