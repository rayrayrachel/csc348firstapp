<nav x-data="{ open: false }" class="navbar-sticky-top">
    <div class="bg-teal-200 border-b border-white-100">
        <div class="below-sticky">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" wire:navigate>
                                <x-application-logo class="logo" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex justify-center">
                            @auth
                                <x-nav-link wire:navigate :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                    class="w-20 text-center hover:bg-teal-600 hover:text-white justify-center">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                            @endauth
                            @guest
                                <x-nav-link wire:navigate :href="route('welcome')" :active="request()->routeIs('welcome')"
                                    class="w-20 text-center hover:bg-teal-600 hover:text-white justify-center">
                                    {{ __('WELCOME') }}
                                </x-nav-link>
                            @endguest
                            <x-nav-link wire:navigate :href="route('bloggers')" :active="request()->routeIs('bloggers')"
                                class="w-20 text-center hover:bg-teal-600 hover:text-white justify-center">
                                {{ __('Bloggers') }}
                            </x-nav-link>
                            <x-nav-link wire:navigate :href="route('projects')" :active="request()->routeIs('projects')"
                                class="w-20 text-center  hover:bg-teal-600 hover:text-white justify-center">
                                {{ __('Projects') }}
                            </x-nav-link>
                        </div>
                    </div>
                    <div align="right" class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                        @guest
                            <x-nav-link wire:navigate :href="route('login')" :active="request()->routeIs('login')"
                                class="w-20  justify-center hover:bg-teal-600 hover:text-white">
                                {{ __('Log in') }}
                            </x-nav-link>

                            @if (Route::has('register'))
                                <x-nav-link wire:navigate :href="route('register')" :active="request()->routeIs('register')"
                                    class=" w-20  justify-center hover:bg-teal-600 hover:text-white">
                                    {{ __('Register') }}
                                </x-nav-link>
                            @endif
                        @endguest
                    </div>

                    @auth
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#2B3A42] hover:text-white focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link wire:navigate :href="route('profile.edit')">
                                        {{ __('User Profile') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link wire:navigate :href="route('blogger.profile')">
                                        {{ __('Blogger Profile') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endauth

                    @auth
                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                    @endauth
                </div>
            </div>

            @auth
                <!-- Responsive Navigation Menu -->
                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link wire:navigate :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="text-white hover:bg-teal-600">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-teal-600">
                                {{ __('User Profile') }}
                            </x-responsive-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-white hover:bg-teal-600">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
