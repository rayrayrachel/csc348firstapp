<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateProject extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $status;
    public $featureimage;
    public $methodology_used;
    public $project_link;

    public $allCategories = [];
    public $selectedCategory = '';
    public $selectedCategories = []; 

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|string',
        'featureimage' => 'nullable|image|max:1024',
        'methodology_used' => 'nullable|string|max:255',
        'project_link' => 'nullable|url|max:255',
    ];

    protected $messages = [
        'featureimage.max' => 'The image size cannot be greater than 1024 kilobytes (1MB).',
    ];

    public function mount()
    {
        $this->allCategories = Category::all();
    }

    public function addCategory()
    {
        if ($this->selectedCategory && !isset($this->selectedCategories[$this->selectedCategory])) {
            $category = Category::find($this->selectedCategory);
            if ($category) {
                $this->selectedCategories[$category->id] = $category->name;
            }
        }
        $this->selectedCategory = '';
    }

    public function removeCategory($id)
    {
        unset($this->selectedCategories[$id]);
    }

    public function createProject()
    {
        $this->validate();

        $imagePath = $this->featureimage ? $this->featureimage->store('project_images', 'public') : null;

        $project = Project::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'featureimage' => $imagePath,
            'methodology_used' => $this->methodology_used,
            'project_link' => $this->project_link,
        ]);

        if (!empty($this->selectedCategories)) {
            $project->categories()->attach(array_keys($this->selectedCategories));
        }

        $this->dispatch('submitClicked');

        $this->reset([
            'title',
            'description',
            'status',
            'featureimage',
            'methodology_used',
            'project_link',
            'selectedCategories',
            'selectedCategory'
        ]);

        session()->flash('message', 'Project created successfully!');
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
