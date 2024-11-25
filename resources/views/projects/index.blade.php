<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">
            {{ __('All Projects') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="page-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="space-y-6">
                    @forelse ($projects as $project)
                        <a href="{{ route('projects.project', $project->id) }}" class="block">
                            <div class="p-6 bg-white rounded shadow">
                                <div class="flex items-center justify-between">

                                    <div class="project-list-text-container">
                                        <h3 class="text-lg font-bold text-gray-800">{{ $project->title }}</h3>
                                        <p class="text-sm text-gray-600">Blogger:
                                            {{ $project->user->name ?? 'Unknown User' }}
                                        </p>
                                        <p class="text-sm text-gray-600">Description: {{ $project->description }}</p>
                                        <p class="text-sm text-gray-500">Created At:
                                            {{ $project->created_at->format('M d, Y, h:i A') }}</p>
                                    </div>

                                    @if ($project->featureimage)
                                        <img src="{{ asset('storage/' . $project->featureimage) }}"
                                            alt="Feature image of {{ $project->title }}" class="list-image">
                                    @else
                                        <img src="{{ asset('images/default-image.png') }}" alt="Default project image"
                                            class="list-image">
                                    @endif

                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-600">No projects available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
