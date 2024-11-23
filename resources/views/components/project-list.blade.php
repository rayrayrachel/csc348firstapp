<div class="project-list">
    <ul>
        @forelse ($projects as $project)
            <a href="{{ route('projects.project', $project->id) }}" class="block">
                <li>
                    <h4>{{ $project->title }}</h4>
                    <p>{{ $project->description }}</p>
                </li>
            </a>
        @empty
            <p class="no-projects">{{ __('No projects found.') }}</p>
        @endforelse
    </ul>
</div>
