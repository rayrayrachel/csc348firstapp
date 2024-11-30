<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class BloggerPFP extends Component
{

    public $userId;
    public $blogger;

    protected $listeners = ['submitClicked' => '$refresh'];
    public function mount($userId = null)
    {
        $this->userId = $userId ?? Auth::id();
        $this->blogger = User::with('bloggerProfile')->findOrFail($this->userId);
    }

    public function render()
    {
        return view('livewire.blogger-p-f-p');
    }
}



