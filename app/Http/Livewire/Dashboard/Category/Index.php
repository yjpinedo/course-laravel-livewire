<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use App\Traits\OrderColumnsTrait;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, OrderColumnsTrait;

    public $confirmingDeletedCategory;
    public $categoryToDelete;

    public $columns = [
        'id' => 'Id',
        'title' => 'Title',
    ];

    public function render()
    {
        return view('livewire.dashboard.category.index', ['categories' => Category::orderBy($this->sortColumn, $this->sortMethod)->paginate(5)]);
    }

    public function selectCategory(Category $category)
    {
        $this->categoryToDelete = $category;
        $this->confirmingDeletedCategory = true;
    }

    public function delete()
    {
        $this->emit('deleted');
        $this->confirmingDeletedCategory = false;
        $this->categoryToDelete->delete();
    }
}
