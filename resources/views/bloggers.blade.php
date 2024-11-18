{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bloggers') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="blogger-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="blogger-card">
                    <div class="blogger-content">
                        @if ($bloggers)
                        @foreach ($bloggers as $blogger)
                        <li>{{$blogger->user_name}}
                            @endforeach
                            @else
                            <h1>No exsisting blogger</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
 --}}

 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bloggers') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="blogger-list">
                @foreach ($bloggers as $blogger)
                    <div class="blogger-card">
                        <h3>
                        <a href="{{ route('blogger.profile', $blogger->id) }}">{{ $blogger->user_name }}</a></h3>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
</x-app-layout>
