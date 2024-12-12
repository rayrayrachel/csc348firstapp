<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class CommentsDisplay extends Component
{
    use WithPagination;

    public $projectId;
    public $userId;  
    public $perPage = 5;
    public $editingCommentId = null;
    public $confirmingDelete = null;

    protected $listeners = ['submitClicked' => '$refresh', 'confirmClicked' => '$refresh'];


    public function mount($projectId = null, $userId = null)
    {
        $this->projectId = $projectId;
        $this->userId = $userId;
    }
    public function toggleEditForm($commentId)
    {
        if ($this->editingCommentId === $commentId) {
            $this->editingCommentId = null;
        } else {
            $this->editingCommentId = $commentId; 
        }
    }

    public function confirmDelete($commentId)
    {
        $this->confirmingDelete = $commentId;

    }


    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);

        if ($comment && $comment->user_id === Auth::id()|| Auth::user()->role === 'admin') {
            $comment->delete();
            session()->flash('message', 'Comment deleted successfully!');

            if ($this->confirmingDelete === $commentId) {
                $this->confirmingDelete = null;
            }

            $this->dispatch('confirmClicked');
        } else {
            session()->flash('error', 'You are not authorized to delete this comment.');
        }
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
