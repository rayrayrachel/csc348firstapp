<x-app-layout>
    <x-slot name="header">
        <h2 class="pageHeader">
            {{ __('Blogger Profile') }}
        </h2>
    </x-slot>

    
    @section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <section>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.display-blogger-form')
                </div>
            </div>
        </section>

        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">{{ __('Update Blogger Profile') }}</h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Update the profile information of your blog which is also displayed to everyone.') }}
                </p>
            </header>

            <form method="POST" action="{{ route('blogger.profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="bio" :value="__('Bio')" />
                    <textarea id="bio" name="bio" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Write your bio here">{{ old('bio', $bloggerProfile->bio) }}</textarea>
                    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="website" :value="__('Website')" />
                    <x-text-input id="website" name="website" type="url" class="mt-1 block w-full" placeholder="https://example.com" :value="old('website', $bloggerProfile->website)" />
                    <x-input-error :messages="$errors->get('website')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="location" :value="__('Location')" />
                    <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" placeholder="City, Country" :value="old('location', $bloggerProfile->location)" />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                    <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $bloggerProfile->date_of_birth)" />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                </div>


                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

                    @if (session('status') === 'blogger-profile-updated')
                        <p class="text-sm text-green-600">{{ __('Profile updated successfully.') }}</p>
                    @endif
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
</x-app-layout>
