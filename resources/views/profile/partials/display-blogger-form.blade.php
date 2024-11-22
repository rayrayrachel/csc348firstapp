

            <!-- Display Profile Information -->
            <section>
                <header>
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Blogger Profile Information') }}</h3>
                </header>
    
            </br>
                    <div class="space-y-4">
                        <p><strong>{{ __('Bio:') }}</strong> {{ $bloggerProfile->bio ?? 'No bio provided' }}</p>
                        <p><strong>{{ __('Website:') }}</strong> 
                            <a href="{{ $bloggerProfile->website ?? 'Not provided' }}" target="_blank" class="text-blue-500">
                                {{ $bloggerProfile->website ?? 'Not provided' }}
                            </a>
                        </p>
                        <p><strong>{{ __('Location:') }}</strong> {{ $bloggerProfile->location ?? 'Not provided' }}</p>
                        <p><strong>{{ __('Date of Birth:') }}</strong> {{ $bloggerProfile->date_of_birth ?? 'Not provided' }}</p>
                        <p><strong>{{ __('Account Created:') }}</strong> {{ $bloggerProfile->created_at ?? 'Not provided' }}</p>
                    </div>

                </br>
            </section>


  