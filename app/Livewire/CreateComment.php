<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateComment extends Component
{
    public $projectId;
    public $content;

    protected $rules = [
        'content' => 'required|string|max:1000',
    ];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function submitComment()
    {
        $this->validate();

        Comment::create([
            'user_id' => Auth::id(), 
            'project_id' => $this->projectId,
            'content' => $this->content,
        ]);

        $this->content = '';
         
        session()->flash('message', 'Your comment has been added!');

        $this->dispatch('submitClicked');
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}

