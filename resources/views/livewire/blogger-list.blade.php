<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="page-header">
                {{ __('Blogger Profile') }}
            </h2>
        </x-slot>

        <div class="page-container">
            <div class="element-container">
                @foreach ($bloggers as $blogger)
                    <a href="{{ route('bloggers.profile', $blogger->id) }}" class="block">
                        <div class="blogger-card">
                            <div class="blogger-content">
                                <div class="profile-picture-container">
                                    @if ($blogger->profile_picture)
                                        <img src="{{ asset('storage/' . $blogger->profile_picture) }}"
                                            alt="Profile picture of {{ $blogger->user_name }}" class="profile-picture">
                                    @else
                                        <img src="{{ asset('images/default-pfp.gif') }}" alt="Default project image"
                                            class="profile-picture">
                                    @endif
                                </div>
                                <div class="blogger-list-text-container">

                                    <h3 class="blogger-name"> {{ $blogger->user_name }} </h3>
                                    <p class="blogger-info"> {{ $blogger->bio }} </p>
                                    <p class="blogger-info"> {{ $blogger->location }} </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                <div class="pagination">
                    {{ $bloggers->links() }}
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
