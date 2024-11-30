<div>
    @forelse ($projects as $project)
        <a href="{{ route('project.details', $project->id) }}" class="project-item">
            <div class="project-card">

                <div class="project-content">

                    <div class="project-list-text-container">

                        <div class="blogger-name-container">
                            <div class="pfp">
                                <div class="pfp-container">
                                    @if ($project->user->bloggerProfile->profile_picture)
                                        <img src="{{ asset('storage/' . $project->user->bloggerProfile->profile_picture) }}"
                                            alt="{{ $project->user->name }}'s Profile Picture" class="pfp-container">
                                    @else
                                        <img src="{{ asset('images/default-pfp.gif') }}" alt="Default Profile Picture"
                                            class="pfp-container">
                                    @endif
                                </div>
                            </div>

                            <div class="blogger-details">
                                <h3>{{ $project->user->name }}</h3>
                                <p class="project-info">Created At: {{ $project->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <h2>{{ $project->title }}</h2>

                            @if ($project->status)
                                <div class="project-status">
                                    {{ $project->status }}
                                </div>
                            @endif

                        </div>
                        <p class="project-info">Description: {{ $project->description }}</p>

                    </div>
                            @if ($project->categories->isNotEmpty())
                                <div >
                                    @foreach ($project->categories as $category)
                                        <span class="category">{{ $category->name }}</span>
                                        @if (!$loop->last)
                                            <span> </span>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
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
