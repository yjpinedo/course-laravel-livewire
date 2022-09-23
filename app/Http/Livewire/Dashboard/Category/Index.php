<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeletedCategory;
    public $categoryToDelete;

    public function render()
    {
        return view('livewire.dashboard.category.index', ['categories' => Category::latest()->paginate(4)]);
    }

    public function seletCategory(Category $category)
    {
        $this->categoryToDelete = $category;
        $this->confirmingDeletedCategory = true;
    }

    public function delete()
    {
        $this->emit('deleted');
        $this->categoryToDelete->delete();
        $this->confirmingDeletedCategory = false;
    }
}
