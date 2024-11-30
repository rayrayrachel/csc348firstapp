<div class="blogger-name-container">
    <a href="{{ route('bloggers.profile', $blogger->id) }}">
        <div class="pfp">
            <div class="pfp-container">
                @if ($blogger->bloggerProfile && $blogger->bloggerProfile->profile_picture)
                    <img src="{{ asset('storage/' . $blogger->bloggerProfile->profile_picture) }}"
                        alt="{{ $blogger->name }}'s Profile Picture" class="pfp-container">
                @else
                    <img src="{{ asset('images/default-pfp.gif') }}" alt="Default Profile Picture" class="pfp-container">
                @endif
            </div>
        </div>

        <div class="blogger-details">
            <h2 class="blogger-name">{{ $blogger->bloggerProfile->user_name ?? $blogger->name }}</h2>
        </div>
    </a>
</div>
