<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Project;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Statistics extends Component
{
    public $totalProjects;
    public $totalComments;

    protected $listeners = ['submitClicked' => 'mount'];

    public function mount()
    {
        $user = Auth::user();
        $projects = $user->projects; 
        $comments = $user->comments;

        $this->totalProjects = $projects ->count();  
        $this->totalComments = $comments ->count();

    }


    public function handleProjectsClick()
    {
        $this->dispatch('projectsClicked');
    }

    public function handleCommentsClick()
    {
        $this->dispatch('commentsClicked'); 
    }

    public function render()
    {
        return view('livewire.statistics');
    }
}
