<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $projects; 
    public $stats;    

    public $showCreateProjectForm = false;
    public $activeTab = 'projects';

    public function index()
    {
        $user = Auth::user();
        $this->projects = $user->projects;
        $this->stats = [
            'total_projects' => $this->projects->count(),
        ];
    }

       public function render()
    {
        return view('livewire.dashboard');
    }
}
