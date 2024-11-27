<?php

namespace App\Livewire;

use App\Models\BloggerProfile;
use Livewire\Component;
use Livewire\WithPagination;

class BloggerList extends Component
{

    use WithPagination;
    public function render()
    {
        $perPage = 10;
        $bloggers = BloggerProfile::orderBy('created_at', 'desc')->paginate($perPage);
        return view('livewire.blogger-list', compact('bloggers'));
    }
}
