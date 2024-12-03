<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EditComment extends Component
{
    public $commentId;
    public $content;
    public $isEditing = false;

    protected $rules = [
        'content' => 'required|string|max:1000',
    ];

    public function mount(Comment $comment)
    {
        $this->commentId = $comment->id;
        $this->content = $comment->content;
    }

    public function updateComment()
    {
        $this->validate();

        $comment = Comment::find($this->commentId);

        if (Auth::id() != $comment->user_id) {
            session()->flash('error', 'You are not authorized to edit this comment.');
            return;
        }

        $comment->update(['content' => $this->content]);

        session()->flash('message', 'Comment updated successfully!');
        $this->isEditing = false;

        $this->dispatch('submitClicked');
    }

    public function render()
    {
        return view('livewire.edit-comment');
    }
}
