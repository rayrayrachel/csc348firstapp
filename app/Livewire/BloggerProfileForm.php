<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BloggerProfile;
use Illuminate\Support\Facades\Auth;

class BloggerProfileForm extends Component
{
    use WithFileUploads;

    public $bio;
    public $website;
    public $location;
    public $date_of_birth;
    public $profile_picture;
    public $bloggerProfile;

    protected $rules = [
        'bio' => 'nullable|string|max:255',
        'website' => 'nullable|url',
        'location' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'profile_picture' => 'nullable|image|max:1024', 
    ];

    public function mount()
    {

        $this->bloggerProfile = Auth::user()->bloggerProfile;

        $this->bio = $this->bloggerProfile->bio;
        $this->website = $this->bloggerProfile->website;
        $this->location = $this->bloggerProfile->location;
        $this->date_of_birth = $this->bloggerProfile->date_of_birth;
    }

    public function save()
    {
        $this->validate();

        if ($this->profile_picture) {
            $profile_picture_path = $this->profile_picture->store('profile_pictures', 'public');
            $this->bloggerProfile->profile_picture = $profile_picture_path;
        }

        $this->bloggerProfile->bio = $this->bio;
        $this->bloggerProfile->website = $this->website;
        $this->bloggerProfile->location = $this->location;
        $this->bloggerProfile->date_of_birth = $this->date_of_birth;
        $this->bloggerProfile->save();

        session()->flash('message', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.blogger-profile-form');
    }
}
