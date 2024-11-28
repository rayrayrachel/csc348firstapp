<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Project;

class ProjectDetails extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project-details');
    }

}
