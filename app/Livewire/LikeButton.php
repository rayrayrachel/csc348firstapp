<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class LikeButton extends Component
{
    protected $listeners = ['refreshed' => '$refresh'];
    public $likeable;
    public $isLiked = false;

    public $likeCount = 0;

    #[On('submitClicked')]
    public function mount($likeable)
    {
        $this->likeable = $likeable;
        $this->isLiked = $this->likeable->likes()->where('user_id', Auth::id())->exists();
        $this->likeCount = $likeable->likes()->count();
    }
    #[On('submitClicked')]
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

        $this->isLiked = !$this->isLiked;

        $this->dispatch('likeToggled');
    }


    #[On('submitClicked')]

    public function render()
    {
        return view('livewire.like-button');
    }
}
