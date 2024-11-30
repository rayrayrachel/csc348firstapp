<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $categories = [];  // To store selected categories
    public $title, $description, $status, $featureimage, $methodology_used, $project_link;
    public $allCategories;

    public function mount()
    {
        $this->allCategories = Category::all();
    }
    
    // public function render()
    // {
    //     return view('livewire.categories');
    // }
}
