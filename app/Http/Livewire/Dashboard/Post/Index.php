<?php

namespace App\Http\Livewire\Dashboard\Post;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Traits\OrderColumnsTrait;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, OrderColumnsTrait;

    public $confirmingDeletedPost;
    public $postToDelete;

    /* Filters */

    public $posted, $type, $category_id;

    /* Search */

    public $search;

    /* Between Dates */

    public $from, $to;

    /* Sorts */
    public $columns = [
        'id' => 'Id',
        'title' => 'Title',
        'date' => 'Date',
        'description' => 'Description',
        'posted' => 'Posted',
        'type' => 'Type',
        'category_id' => 'Category',
    ];

    /* QueryString */
    protected $queryString = ['search', 'posted', 'type', 'category_id'];

    public function render()
    {
        $posts = Post::orderBy($this->sortColumn, $this->sortMethod);

        if ($this->search && $this->search != '') {
            $posts->where(function ($query) {
                $query->orWhere('id', 'like', "%$this->search%")
                    ->orWhere('title', 'like', "%$this->search%")
                    ->orWhere('description', 'like', "%$this->search%");
            });
        }

        if ($this->from && $this->to != '') {
            $posts->whereBetween('date', [date($this->from), date($this->to)]);
        }

        if ($this->posted && $this->posted != '') {
            $posts->where('posted', $this->posted);
        }

        if ($this->type && $this->type != '') {
            $posts->where('type', $this->type);
        }

        if ($this->category_id && $this->category_id != '') {
            $posts->where('category_id', $this->category_id);
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
