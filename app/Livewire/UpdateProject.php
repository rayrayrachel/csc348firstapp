<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UpdateProject extends Component
{
    use WithFileUploads;

    public $project;
    public $projectId;
    public $title;
    public $description;
    public $status;
    public $featureimage;
    public $methodology_used;
    public $project_link;

    public $allCategories = [];
    public $selectedCategory = '';
    public $selectedCategories = [];
    public $confirmingDelete = false;

    protected $listeners = ['deletePost' => 'redirectAndRefresh'];

    public function redirectAndRefresh()
    {
        $this->dispatchBrowserEvent('refreshAndRedirect', ['url' => route('projects')]);
    }


    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'nullable|string|in:ongoing,completed,cancelled',
        'featureimage' => 'nullable|image|max:1024',
        'methodology_used' => 'nullable|string|max:255',
        'project_link' => 'nullable|url|max:255',
    ];

    protected $messages = [
        'featureimage.max' => 'The image size cannot be greater than 1024 kilobytes (1MB).',
    ];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->project = Project::find($projectId);

        if (!$this->project) {
            session()->flash('message', 'The project no longer exists.');
            return redirect()->route('projects');
        }

        if ($this->project->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $this->title = $this->project->title;
        $this->description = $this->project->description;
        $this->status = $this->project->status;
        $this->methodology_used = $this->project->methodology_used;
        $this->project_link = $this->project->project_link;
        $this->selectedCategories = $this->project->categories->pluck('id')->toArray();

        $this->allCategories = Category::all();
    }


    public function addCategory()
    {
        if ($this->selectedCategory && !in_array((int)$this->selectedCategory, $this->selectedCategories)) {
            $this->selectedCategories[] = (int)$this->selectedCategory;
        }
        $this->selectedCategory = '';
    }

    public function removeCategory($id)
    {
        $this->selectedCategories = array_filter($this->selectedCategories, function ($categoryId) use ($id) {
            return $categoryId != $id;
        });
    }

    public function updateProject()
    {
        $this->validate();

        $project = Project::find($this->projectId);

        if (!$project) {
            session()->flash('message', 'The project no longer exists.');
            return redirect()->route('projects');
        }

        if ($project->user_id !== Auth::id()&& Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $imagePath = $this->featureimage
            ? $this->featureimage->store('project_images', 'public')
            : $project->featureimage;

        $project->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'featureimage' => $imagePath,
            'methodology_used' => $this->methodology_used,
            'project_link' => $this->project_link,
        ]);

        $validCategories = array_filter($this->selectedCategories, function ($categoryId) {
            return (int)$categoryId > 0;
        });
        $project->categories()->sync($validCategories);

        session()->flash('message', 'Project updated successfully!');
    }


    public function render()
    {
        return view('livewire.update-project');
    }

    public function confirmDelete()
    {
        $this->confirmingDelete = true;
    }

    public function deleteProject()
    {
        $project = Project::find($this->projectId);

        if ($project && $project->user_id === Auth::id() || Auth::user()->role === 'admin') {
            $project->delete();

            session()->flash('message', 'Project deleted successfully!');

            $this->dispatch('refreshAndRedirect', ['url' => route('projects')]);

            return; 
        }

        $this->dispatch('refreshAndRedirect', ['url' => route('projects')]);
    }
}
