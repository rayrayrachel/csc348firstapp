<div>

    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Blogger Profile') }}
        </h2>
    </x-slot>
    <div class="page-container">
        <div class="element-container">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div>

                    <div class="update-blogger-information-profile-picture-container ">
                        @if ($bloggerProfile->profile_picture)
                            <img src="{{ asset('storage/' . $bloggerProfile->profile_picture) }}"
                                alt="Profile picture of {{ Auth::user()->name }}"
                                class="update-blogger-information-profile-picture">
                        @else
                            <img src="{{ asset('images/default-pfp.gif') }}" alt="Default profile image"
                                class="update-blogger-information-profile-picture">
                        @endif
                    </div>

                    @if ($profile_picture)
                        <div>
                            <label>Preview:</label>
                            <img src="{{ $profile_picture->temporaryUrl() }}" alt="Image Preview"
                                style="max-width: 100%; height: auto; border: 1px solid #ccc;" />
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="profile_picture">Change Profile Picture</label>
                        <input type="file" wire:model="profile_picture" id="profile_picture">
                        @error('profile_picture')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="bio">{{ __('Bio:') }}</label>
                        <textarea wire:model="bio" id="bio" class="w-full">{{ $bio }}</textarea>
                        @error('bio')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="website">{{ __('Website:') }}</label>
                        <input type="url" wire:model="website" id="website" class="w-full"
                            value="{{ $website }}">
                        @error('website')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="location">{{ __('Location:') }}</label>
                        <input type="text" wire:model="location" id="location" class="w-full"
                            value="{{ $location }}">
                        @error('location')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="date_of_birth">{{ __('Date of Birth:') }}</label>
                        <input type="date" wire:model="date_of_birth" id="date_of_birth" class="w-full"
                            value="{{ $date_of_birth }}">
                        @error('date_of_birth')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="submit-btn">{{ __('Save Changes') }}</button>
                </div>
            </form>

            @if (session()->has('message'))
                <div class="alert alert-success mt-4">{{ session('message') }}</div>
            @endif
        </div>
    </div>

</div>
