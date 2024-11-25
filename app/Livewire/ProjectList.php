<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;

    public $authOnly = false;
    public $userId = null;

    protected $listeners = ['projectCreated' => '$refresh'];

    public function loadProjects()
    {
        $perPage = 5;
        $currentUser = Auth::id();

        if ($this->authOnly) {
            return Project::where('user_id', $currentUser)
                ->latest()
                ->paginate($perPage);
        } elseif ($this->userId) {
            return Project::where('user_id', $this->userId)
                ->latest()
                ->paginate($perPage);
        } else {
            return Project::with('user')
                ->latest()
                ->paginate($perPage);
        }
    }

    public function render()
    {
        $projects = $this->loadProjects();

        return view('livewire.project-list', compact('projects'));
    }
}
