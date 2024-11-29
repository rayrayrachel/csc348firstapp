<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="page-header">
                {{ __('Project Details') }}
            </h2>
        </x-slot>
        <div class="page-container">

                <div class="element-container">
                    
                    <h2>{{ $project->title }}</h2>
                    <p class="text-description">Description: {{ $project->description }}</p>

                    @if ($project->featureimage)
                        <img src="{{ asset('storage/' . $project->featureimage) }}"
                            alt="Feature image of {{ $project->title }}">
                    @endif

                    <p class="text-description">Methodology Used: {{ $project->methodology_used }}</p>
                    <p class="timestamp">Created At: {{ $project->created_at->format('M d, Y') }}</p>
                    <p class="timestamp">Updated At: {{ $project->updated_at->format('M d, Y') }}</p>
                    <p class="author">
                        Blogger: {{ $project->user->name ?? 'Unknown User' }}
                    </p>

                    @if ($project->project_link)
                        <p class="link">External Link To This Project:
                            <a href="{{ $project->project_link }}" target="_blank">
                                {{ $project->project_link }}
                            </a>
                        </p>
                    @endif
                </div>

                <div class="element-container">
                    <div class="mt-6">
                        <livewire:comments-display :projectId="$project->id" />
                    </div>
                </div>
            </div>

    </x-app-layout>
</div>
