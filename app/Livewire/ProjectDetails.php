<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Project;

class ProjectDetails extends Component
{
    public $project;
    protected $listeners = ['confirmClicked' => '$refresh'];
    

    public function mount(Project $project)
    {
        $this->project = $project;

        if (!$this->project) {
            return redirect()->route('projects');
        }
    }

    public function render()
    {
        return view('livewire.project-details');
    }

}
