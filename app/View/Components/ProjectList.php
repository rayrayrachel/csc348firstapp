<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectList extends Component
{
    /**
     * Create a new component instance.
     */
    public $projects;
    
    public function __construct($projects)
    {
        $this->projects = $projects;  // Assign the passed data to the $projects property
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-list');
    }
}
