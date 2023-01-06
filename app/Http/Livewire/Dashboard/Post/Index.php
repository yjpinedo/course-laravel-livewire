<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeletedPost;
    public $postToDelete;

    /* Filters */

    public $posted, $type, $category_id;

    public function render()
    {
        $posts = Post::latest();
        if ($this->posted && $this->posted != '') {
            $posts = $posts->where('posted', $this->posted);
        }

        if ($this->type && $this->type != '') {
            $posts = $posts->where('type', $this->type);
        }

        if ($this->category_id && $this->category_id != '') {
            $posts = $posts->where('category_id', $this->category_id);
        }

        return view('livewire.dashboard.post.index', ['posts' => $posts->paginate(10), 'categories' => Category::pluck('title', 'id')]);
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
