<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class CommentsDisplay extends Component
{
    use WithPagination;
    public $projectId;
    protected $listeners = ['submitClicked' => '$refresh'];

    public $perPage = 5;

    public function mount($projectId = null)
    {
        $this->projectId = $projectId;
    }
    public function render()
    {
  
        $comments = Comment::with('user')
            ->where('project_id', $this->projectId)
            ->paginate($this->perPage);

        return view('livewire.comments-display', [
            'comments' => $comments
        ]);
    }
}

