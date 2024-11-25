<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;

class ProjectList extends Component
{
    public $userId; 
    public $authOnly = false; 
    public $projects;
    public $currentUser;


    protected $listeners = ['projectCreated' => 'loadProjects'];
    
    public function mount($userId = null, $authOnly = false)
    {
        $this->userId = $userId;
        $this->authOnly = $authOnly;
        $this->currentUser = Auth::id();
    }

    public function loadProjects()
    {

        if ($this->authOnly) {
            $this->projects = Project::where('user_id', $this->currentUser)->latest()->get();
        }

        elseif ($this->userId) {
            $this->projects = Project::where('user_id', $this->userId)->latest()->get();
        }

        else {
            $this->projects = Project::with('user')->latest()->get();
        }
    }

    public function render()
    {
        $this->loadProjects();
        return view('livewire.project-list');
    }
}
