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

    protected $listeners = ['submitClicked' => '$refresh'];

    public $context = null;

    public function mount($context = null)
    {
        $this->context = $context;
    }
    public function updatingPage()
    {
        if ($this->context === 'dashboard') {
            $this->dispatch('preserveScroll');
            logger('updatingPage triggered for dashboard project list');

        } elseif ($this->context === 'other-bloggers-projects') {
            $this->dispatch('preserveScrollOtherUserProjectList');
            logger('updatingPage triggered for other bloggers project list');
        }
    }
    public function loadProjects($context = null)
    {
        $perPage = 5;
        $currentUser = Auth::id();

        
        if ($this->authOnly) {
            return Project::where('user_id', $currentUser)
                ->latest()
                ->withCount('likes')
                ->withCount('comments')
                ->paginate($perPage);
        } elseif ($this->userId) {
            return Project::where('user_id', $this->userId)
                ->latest()
                ->withCount('likes')
                ->withCount('comments')
                ->paginate($perPage);
        } else {
            return Project::with('user')
                ->latest()
                ->withCount('likes')
                ->withCount('comments')
                ->paginate($perPage);
        }
    }

    public function render()
    {
        $projects = $this->loadProjects();

        return view('livewire.project-list', compact('projects'));
    }
}
