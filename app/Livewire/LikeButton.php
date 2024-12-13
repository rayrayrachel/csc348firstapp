<?php

namespace App\Livewire;

use App\Mail\LikeNotification;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Mail;

class LikeButton extends Component
{
    protected $listeners = ['submitClicked' => '$refresh', 'confirmClicked' => '$refresh'];

    public $likeable;
    public $isLiked = false;

    public $likeCount = 0;

    #[On('submitClicked', 'confirmClicked')]
    public function mount($likeable)
    {
        if ($likeable) {
            $this->likeable = $likeable;
            $this->isLiked = $this->likeable->likes()->where('user_id', Auth::id())->exists();
            $this->likeCount = $likeable->likes()->count();
        }
    }
    #[On('submitClicked', 'confirmClicked')]
    // Toggle like state
    public function toggleLike()
    {
        if ($this->isLiked) {
            $this->likeable->likes()->where('user_id', Auth::id())->delete();
            $this->likeCount--;
        } else {
            $this->likeable->likes()->create(['user_id' => Auth::id()]);
            $this->likeCount++;
        }

        if (method_exists($this->likeable, 'user') && Auth::id() != $this->likeable->user_id) {
            $owner = $this->likeable->user;
            Mail::to($owner->email)->send(new LikeNotification($this->likeable, Auth::user()));
        }

        $this->isLiked = !$this->isLiked;

        $this->dispatch('likeToggled');
    }


    #[On('submitClicked', 'confirmClicked')]

    public function render()
    {
        return view('livewire.like-button');
    }
}
