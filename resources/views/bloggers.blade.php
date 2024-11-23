<x-app-layout>
    <x-slot name="header">
        <h2 class="pageHeader">
            {{ __('All Bloggers') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="blogger-list">
                @foreach ($bloggers as $blogger)
                    <a href="{{ route('bloggers.profile', $blogger->id) }}" class="block">
                        <div class="blogger-card p-4 mb-4">
                            <h3 class="text-lg font-semibold text-primary">
                                {{ $blogger->user_name }}
                            </h3>
                            <p class="text-neutral-900">
                                {{ $blogger->bio }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endsection
</x-app-layout>
