<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Statistics extends Component
{
    public $userId;
    public $totalProjects;
    public $totalComments;

    protected $listeners = ['submitClicked' => 'mount'];

    public function mount($userId = null)
    {

        $this->userId = $userId ?? Auth::id();
        $user = User::findOrFail($this->userId);
        $this->totalProjects = $user->projects()->count();
        $this->totalComments = $user->comments()->count();
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
        return view('livewire.statistics', [
            'totalProjects' => $this->totalProjects,
            'totalComments' => $this->totalComments,
        ]);
    }
}
