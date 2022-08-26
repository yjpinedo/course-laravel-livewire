<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $categories;
    public function render()
    {
        $this->categories = Category::get();
        return view('livewire.dashboard.category.index', ['categories' => $this->categories]);
    }
}
