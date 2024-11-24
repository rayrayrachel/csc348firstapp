<?php

namespace App\Livewire;

use Livewire\Component;

class BackgroundMusic extends Component
{
    public $currentTime = 0;

    protected $listeners = ['updateTime'];

    public function updateTime($time)
    {
        $this->currentTime = $time;
    }

    public function render()
    {
        return view('livewire.background-music');

        
    }
}
