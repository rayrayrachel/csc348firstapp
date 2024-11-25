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

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|string',
        'featureimage' => 'nullable|image|max:1024',
        'methodology_used' => 'nullable|string|max:255',
        'project_link' => 'nullable|url|max:255',
    ];

    protected $messages = [
        'featureimage.max' => 'The image size cannot be greater than 1024 kilobytes (1MB).', // Custom message for image size limit
    ];

    public function createProject()
    {
        $this->validate();

 
        if ($this->featureimage) {
            $imagePath = $this->featureimage->store('project_images', 'public');
        } else {
            $imagePath = null;
        }

        Project::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'featureimage' => $imagePath,
            'methodology_used' => $this->methodology_used,
            'project_link' => $this->project_link,
        ]);

        $this->dispatch('projectCreated'); 

        $this->reset();

        session()->flash('message', 'Project created successfully!');
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
