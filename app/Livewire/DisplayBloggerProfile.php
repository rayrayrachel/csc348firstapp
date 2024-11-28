<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DisplayBloggerProfile extends Component
{
    public $bloggerProfile;

    public function mount()
    {
        $user = Auth::user();
        $this->bloggerProfile = $user->bloggerProfile;
    }

    public function render()
    {
        return view('livewire.display-blogger-profile');
    }
}
