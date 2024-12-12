<div>
    <div class="banner-container">
        <div class="text-overlay">
            <div class="text-white text-4xl font-bold shadow-lg"> {{ $welcomeMessage }}</div>
            <p class="subtitle">Be prepared for the opportunities.</p>
        </div>

        <div class="banner"
            style="height: 300px; background-image: url('{{ asset('images/ArtHeader.jpg') }}'); background-size: cover; background-position: center;">
        </div>
    </div>
    <div>
        <div class="page-container">

            <div class="element-container">

                <div class="text-center py-10">
                    <h1 class="text-4xl font-bold text-teal-600 mb-6"> CV Blog Makes Your Live More Organised</h1>
                    <h3 class="text-gray-700 mb-8"> {{ $prompt }}</h3>

                    <x-nav-link wire:navigate :href="route('register')" :active="request()->routeIs('register')"
                        class="register-btn text-lg font-lobster text-indigo-600 hover:text-indigo-800 hover: transition duration-300 ease-in-out">
                        {{ __('Register') }}
                    </x-nav-link>

                </div>
            </div>
        </div>
    </div>

</div>
