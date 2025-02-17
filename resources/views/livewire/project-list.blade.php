<div>
    @forelse ($projects as $project)

        <div class="project-card">

            <div class="project-content">

                <div class="project-list-text-container">
                    <a href="{{ route('project.details', $project->id) }}" class="project-item">
                        <div class="flex justify-between items-center">
                            <h2>{{ $project->title }}</h2>
                            <div>
                                @if ($project->status)
                                    <div class="project-status">
                                        {{ $project->status }}
                                    </div>
                                @endif

                            </div>
                        </div>
                    </a>

                    <div class="blogger-name-container flex justify-between items-center">
                        <div class="flex">
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
                                <a href="{{ route('bloggers.profile', $project->user->id) }}">
                                    <h3>{{ $project->user->name }}</h3>
                                </a>
                                <p class="project-info">Created At: {{ $project->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div>
                            <div class="px-3">
                                {{ $project->likes_count }} Likes
                            </div>
                            <div class="px-3">
                                {{ $project->comments_count }} Comments

                            </div>
                        </div>
                    </div>


                    <p class="project-info">Description: {{ $project->description }}</p>
                    @if ($project->categories->isNotEmpty())
                        <div class="py-3">
                            @foreach ($project->categories as $category)
                                <span class="category">{{ $category->name }}</span>
                                @if (!$loop->last)
                                    <span> </span>
                                @endif
                            @endforeach
                        </div>
                    @endif
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


    @empty
        <p class="no-projects">No projects available.</p>
    @endforelse
    <div class="pagination">
        {{ $projects->links() }}
    </div>
</div>
