<x-app-layout>
    <x-slot name="header">
        <h2 class="pageHeader">
            {{ __('All Projects') }}
        </h2>
    </x-slot>


    </@section('content') <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin:1.5em">
        <div class="space-y-6">
            @forelse ($projects as $project)
                <a href="{{ route('projects.project', $project->id) }}" class="block">
                    <div class="p-6 bg-white rounded shadow">
                        <h3 class="text-lg font-bold text-gray-800">Title: {{ $project->title }}</h3>
                        Blogger: {{ $project->user->name ?? 'Unknown User' }}
                        <p class="text-sm text-gray-600">Description: {{ $project->description }}</p>
                        <p class="text-sm text-gray-500">
                    </div>
                @empty
                    <p class="text-gray-600">No projects available.</p>
            @endforelse
        </div>
        </div>
    @endsection
</x-app-layout>
