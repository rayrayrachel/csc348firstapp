<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Blogger Profile') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="blogger-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="blogger-profile">

                    @if ($profile)
                        <h1 class="blogger-profile-header">{{ $profile->user_name }}'s Blog</h1>
                        <p>{{ $profile->bio }}</p>


                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <p>These are the projects done by {{ $profile->user_name }}.</p>
                                <div class="container">
                                    @livewire('project-list', ['userId' => $profile->user_id, 'context' => 'other-bloggers-projects'])
                                </div>
                            </div>
                        </div>
                    @else
                        <h1>No such blogger</h1>
                    @endif

                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
