<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogger Profile') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="blogger-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="blogger-card">
                    <div class="blogger-content">
                        @if($bloggerprofile)
                            <h1 class="blogger-profile-header">{{ $bloggerprofile }}'s Blog</h1>
                            <p>This is the projects done by {{ $bloggerprofile }}</p> 
                        @else
                            <h1>No such blogger</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
