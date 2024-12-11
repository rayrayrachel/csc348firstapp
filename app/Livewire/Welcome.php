<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $welcomeMessage = "Welcome to the site!";

    public function render()
    {
        return view('livewire.welcome');
    }
}
