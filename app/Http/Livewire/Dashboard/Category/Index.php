<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.dashboard.category.index', ['categories' => Category::paginate(8)]);
    }

    public function delete(Category $category)
    {
        $category->delete();
    }
}
