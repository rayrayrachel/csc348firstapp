<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentsDisplay extends Component
{
    public $projectId;

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        
        $comments = Comment::with('user')->where('project_id', $this->projectId)->get();

        return view('livewire.comments-display', [
            'comments' => $comments
        ]);
    }
}
