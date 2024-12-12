<?php

namespace App\Livewire;

use App\Models\BloggerProfile;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class BloggerList extends Component
{
    use WithPagination;

    protected $listeners = ['submitClicked' => '$refresh'];

    // Method to toggle user role
    public function toggleUserRole($userId)
    {
        
        if ($userId ===  Auth::id()) {
            session()->flash('error', 'Cannot change your own role');
            return;
        }

        $user = User::findOrFail($userId);
        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        session()->flash('success', 'User role successfully updated');
    }

    public function render()
    {
        $perPage = 10;

        $bloggers = BloggerProfile::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return view('livewire.blogger-list', compact('bloggers'));
    }
}
