<x-app-layout>
    <x-slot name="header">
        <h2 class="pageHeader">
            {{ __('Project Details') }}
        </h2>
    </x-slot>
    @section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin:1.5em">
        <div class="p-6 bg-white rounded shadow">
            <h3 class="text-lg font-bold text-gray-800">Title: {{ $project->title }}</h3>
            <p class="text-sm text-gray-600">Description: {{ $project->description }}</p>
            <p class="text-sm text-gray-600">Status: {{ $project->status }}</p>
            <p class="text-sm text-gray-600">Methodology Used: {{ $project->methodology_used }}</p>
            <p class="text-sm text-gray-500">Created At: {{ $project->created_at->format('M d, Y') }}</p>
            <p class="text-sm text-gray-500">Updated At: {{ $project->updated_at->format('M d, Y') }}</p>
            <p class="text-sm text-gray-500">
                Blogger: {{ $project->user->name ?? 'Unknown User' }}
            </p>

            @if ($project->project_link)
                <a href="{{ $project->project_link }}" class="text-blue-500 underline mt-4 block" target="_blank">
                    External Link To This Project
                </a>
            @endif
        </div>
    </div>
    @endsection     
</x-app-layout>
