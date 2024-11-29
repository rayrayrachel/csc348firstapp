<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DisplayBloggerProfile extends Component
{
    public $bloggerProfile;
    public $userId;

    public function mount($userId = null)
    {

        $this->userId = $userId ?? Auth::id();
        if (!$this->userId) {
            abort(403, 'Unauthorized access.');
        }

        $user = User::findOrFail($this->userId);
        $this->bloggerProfile = $user->bloggerProfile;

    }

    public function render()
    {
        return view('livewire.display-blogger-profile', [
            'bloggerProfile' => $this->bloggerProfile,
        ]);
    }
}
