<div class="project-list">
    <ul>
        @forelse ($projects as $project)
            <li>
                <h4>{{ $project->title }}</h4>
                <p>{{ $project->description }}</p>
            </li>
        @empty
            <p class="no-projects">{{ __('No projects found.') }}</p>
        @endforelse
    </ul>
</div>
