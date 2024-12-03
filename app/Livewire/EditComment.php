<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
class EditComment extends Component
{
    public $commentId;
    public $content;
    public $isEditing = false;
    // public $editingCommentId = null;
    // public $confirmingDelete = null;
    protected $listeners = ['submitClicked' => '$refresh','confirmClicked' => '$refresh'];
    protected $rules = [
        'content' => 'required|string|max:1000',
    ];


    #[On( 'confirmClicked')]
    public function mount(Comment $comment)
    {
        $this->commentId = $comment->id;
        $this->content = $comment->content;
    }

    // public function confirmDelete($commentId)
    // {
    //     $this->confirmingDelete = $commentId;
    //     $this->dispatch('submitClicked');
    // }
    #[On('confirmClicked')]
    public function updateComment()
    {
        $this->validate();
        $comment = Comment::find($this->commentId);
        
        if($comment){
            if (Auth::id() != $comment->user_id) {
                session()->flash('error', 'You are not authorized to edit this comment.');
                return;
            }

            $comment->update(['content' => $this->content]);

            session()->flash('message', 'Comment updated successfully!');
            $this->isEditing = false;


            $this->dispatch('submitClicked');
        }
        else{
            return;
        }

    }

    // public function deleteComment($commentId)
    // {
    //     $comment = Comment::find($commentId);

    //     if ($comment && $comment->user_id === Auth::id()) {
    //         $comment->delete();
    //         session()->flash('message', 'Comment deleted successfully!');

    //         if ($this->commentId === $commentId) {
    //             $this->commentId = null;
    //             $this->isEditing = false;
    //         }
    //         $this->isEditing = false;

    //         $this->confirmingDelete = null;
            
    //         $this->dispatch('submitClicked');

    //     } else {
    //         session()->flash('error', 'You are not authorized to delete this comment.');
    //     }


    // }

    public function render()
    {
        return view('livewire.edit-comment');
    }
}
