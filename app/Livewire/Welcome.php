<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $welcomeMessage = "Welcome to CV Blogger!";
    public $prompt = "Interested in making your CV portfolio? Join Us!";


    public function render()
    {
        return view('livewire.welcome');
    }

}
