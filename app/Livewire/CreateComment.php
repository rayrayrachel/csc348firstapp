<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Project;
use Livewire\Component;
use App\Mail\CommentNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'project_id' => $this->projectId,
            'content' => $this->content,
        ]);

        $this->content = '';

        session()->flash('message', 'Your comment has been added!');

        $project = $comment->project;
        $author = $project->user;

        if (Auth::id() != $project->user_id) {
            Mail::to($author->email)->send(new CommentNotification($project, $comment, Auth::user()));
        }
        $this->dispatch('submitClicked');
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
