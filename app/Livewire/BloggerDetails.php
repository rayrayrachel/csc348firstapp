<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\BloggerProfile;

class BloggerDetails extends Component
{
    public $profileID;
    public $profile;
    public $projects;


    public function mount($id = null)
    {


        $this->profileID = $id;

        if (!$this->profileID) {
            return redirect()->route('bloggers');
        }

        $this->loadProfileData();
    }

    public function loadProfileData()
    {
        $this->profile = BloggerProfile::findOrFail($this->profileID);
        $this->projects = $this->profile->user->projects;
    }

    public function render()
    {
        return view('livewire.blogger-details');
    }
}
