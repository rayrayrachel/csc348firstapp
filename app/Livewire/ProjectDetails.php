<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Services\YouTubeEmbedService;

class ProjectDetails extends Component
{
    public $project;
    public $embedUrl;

    public function mount(Project $project, YouTubeEmbedService $youtubeEmbedService)
    {
        $this->project = $project;

        if (!$this->project) {
            return redirect()->route('projects');
        }

        $this->embedUrl = $youtubeEmbedService->generateEmbedUrl($this->project->project_link);
    }

    public function render()
    {
        return view('livewire.project-details');
    }
}
