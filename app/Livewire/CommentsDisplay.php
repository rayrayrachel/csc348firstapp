<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class CommentsDisplay extends Component
{
    use WithPagination;

    public $projectId;
    public $userId;  
    public $perPage = 5;  
    protected $listeners = ['submitClicked' => '$refresh'];


    public function mount($projectId = null, $userId = null)
    {
        $this->projectId = $projectId;
        $this->userId = $userId;
    }

    public function render()
    {

        $commentsQuery = Comment::with('user');  

        if ($this->userId) {
            $commentsQuery->where('user_id', $this->userId);
        }

        if ($this->projectId) {
            $commentsQuery->where('project_id', $this->projectId);
        }

        $comments = $commentsQuery->paginate($this->perPage);

        return view('livewire.comments-display', [
            'comments' => $comments
        ]);
    }
}
