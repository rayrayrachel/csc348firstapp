<div>
    @forelse ($projects as $project)
        <a href="{{ route('project.details', $project->id) }}" class="project-item">
            <div class="project-card">
                <div class="project-content">

                    <div class="project-list-text-container">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-info">Blogger: {{ $project->user->name ?? 'Unknown User' }}</p>
                        <p class="project-info">Description: {{ $project->description }}</p>
                        <p class="project-info">Created At: {{ $project->created_at->format('M d, Y, h:i A') }}</p>
                    </div>

                    <div class="project-image-container">
                        @if ($project->featureimage)
                            <img src="{{ asset('storage/' . $project->featureimage) }}"
                                alt="Feature image of {{ $project->title }}" class="project-image">
                        @else
                            <img src="{{ asset('images/default-image.gif') }}" alt="Default project image"
                                class="project-image">
                        @endif
                    </div>
                </div>
            </div>
        </a>

    @empty
        <p class="no-projects">No projects available.</p>
    @endforelse
    <div class="pagination">
        {{ $projects->links() }}
    </div>
</div>
