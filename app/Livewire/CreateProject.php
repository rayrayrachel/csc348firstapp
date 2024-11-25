<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads; 
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

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|string',
        'featureimage' => 'nullable|image|max:1024', // Optional image with max size of 1MB
        'methodology_used' => 'nullable|string|max:255',
        'project_link' => 'nullable|url|max:255',
    ];

    // Submit the form to create the project
    public function createProject()
    {
        $this->validate();

        // Handle image upload if provided
        if ($this->featureimage) {
            $imagePath = $this->featureimage->store('project_images', 'public');
        } else {
            $imagePath = null;
        }

        // Create a new project
        Project::create([
            'user_id' => Auth::id(), // The authenticated user ID
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'featureimage' => $imagePath,
            'methodology_used' => $this->methodology_used,
            'project_link' => $this->project_link,
        ]);

        // Reset the form after submission
        $this->reset();

        // Success message
        session()->flash('message', 'Project created successfully!');
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
