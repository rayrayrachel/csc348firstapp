<div>

    <h2>{{ $bloggerProfile->user_name }} {{ __('\'s Information') }}</h2>


    <div class="blogger-information-profile-container">
        <div class="blogger-information-profile-picture-container">
            @if ($bloggerProfile->profile_picture)
                <img src="{{ asset('storage/' . $bloggerProfile->profile_picture) }}"
                    alt="Profile picture of {{ $bloggerProfile->user_name }}" class="blogger-information-profile-picture">
            @else
                <img src="{{ asset('images/default-pfp.gif') }}" alt="Default profile image"
                    class="blogger-information-profile-picture">
            @endif
        </div>

        <div class="blogger-information-text-container  space-y-2">
            <p><strong>{{ __('Bio:') }}</strong> {{ $bloggerProfile->bio ?? 'No bio provided' }}</p>
            <p><strong>{{ __('Website:') }}</strong>
                @if ($bloggerProfile->website)
                    <a href="{{ $bloggerProfile->website }}" target="_blank" class="text-blue-500">
                        {{ $bloggerProfile->website }}
                    </a>
                @else
                    {{ 'Not provided' }}
                @endif
            </p>
            <p><strong>{{ __('Location:') }}</strong> {{ $bloggerProfile->location ?? 'Not provided' }}</p>

            @if ($bloggerProfile->date_of_birth)
                <p><strong>{{ __('Date of Birth:') }}</strong> {{ $bloggerProfile->date_of_birth ?? 'Not provided' }}
                    <strong>{{ __('Age:') }}</strong>
                    {{ \Carbon\Carbon::parse($bloggerProfile->date_of_birth)->age }} {{ __('years old') }}
                </p>
            @else
                <p>
                    <strong>{{ __('Date of Birth:') }}</strong> {{ $bloggerProfile->date_of_birth ?? 'Not provided' }}
                </p>
            @endif
            <p><strong>{{ __('Account Created:') }}</strong>
                {{ $bloggerProfile->created_at->diffForHumans() ?? 'Not provided' }}</p>
        </div>
    </div>
</div>
