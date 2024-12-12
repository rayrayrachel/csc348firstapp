<div>

    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Blogger Profiles') }}
        </h2>
    </x-slot>

    <div class="page-container">
        <div class="element-container">
            @foreach ($bloggers as $blogger)
                <div class="flex justify-between">
                    <div class="flex-1">
                        <a href="{{ route('bloggers.profile', $blogger->id) }}" class="block">
                            <div class="blogger-card">
                                <div class="blogger-content">
                                    <div class="profile-picture-container">
                                        @if ($blogger->profile_picture)
                                            <img src="{{ asset('storage/' . $blogger->profile_picture) }}"
                                                alt="Profile picture of {{ $blogger->user_name }}"
                                                class="profile-picture">
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
                    </div>


                    <div class="flex items-center">
                        @auth
                            <div>
                                @if (auth()->user()->role === 'admin' && auth()->id() !== $blogger->user->id && $blogger->user->id !== 1)
                                    <div class="admin-actions">
                                        <button wire:click="toggleUserRole({{ $blogger->user->id }})"
                                            class="btn btn-toggle-role {{ $blogger->user->role == 'admin' ? 'bg-red-500' : 'bg-green-500' }}">
                                            {{ $blogger->user->role == 'admin' ? 'REMOVE ADMIN' : 'MAKE ADMIN' }}
                                        </button>
                                    </div>

                                    @elseif (auth()->user()->role === 'admin' )
                                    <div class="admin-actions">
                                        <div class="text-red-500 w-100">Forbidden</div>
                                    </div>
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach

            <div class="pagination">
                {{ $bloggers->links() }}
            </div>
        </div>
    </div>

</div>
