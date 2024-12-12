<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="page-header">
                {{ __('CV BLOG') }}
            </h2>
        </div>
    </x-slot>

    <div class="page-container">
        <div class="element-container">
            <div class="text-center py-10">
                <h1 class="text-4xl font-bold text-teal-600 mb-6"> {{ $welcomeMessage }}</h1>
                <h3 class="text-gray-700 mb-8"> {{ $prompt }}</h3>

                <x-nav-link wire:navigate :href="route('register')" :active="request()->routeIs('register')" class="register-btn">
                    {{ __('Register') }}
                </x-nav-link>
            </div>
        </div>
    </div>


</div>
