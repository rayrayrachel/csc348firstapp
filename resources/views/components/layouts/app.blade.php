<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
    
</head>

<body class="font-sans antialiased" style="background-image: url('{{ asset('images/background.jpeg') }}'); ">
        <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.7); z-index: -1;"></div>

    <div >

        <!-- Livewire Scripts -->   
        @livewireScripts

        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <livewire:background-music />



    <script>
        // Pagination when clicked, scroll view go back to the top of element, instead of page top
        Livewire.on('preserveScroll', () => {
            console.log('preserveScroll event received');
            window.scrollTo({
                top: 550,
            });
        });

        Livewire.on('preserveScrollOtherUserProjectList', () => {
            console.log('preserveScroll event received from other user project list');
            window.scrollTo({
                top: 200,
            });
        });

        // Clear DOM cache for input and text view displayed
        Livewire.on('projectCreated', () => {
            document.querySelectorAll('form input, form textarea, form select').forEach(field => field.value = '');
        });

        Livewire.on('submitClicked', () => {
            document.querySelectorAll('form input, form textarea, form select').forEach(field => field.value = '');
        });
    </script>

    <script>
        window.addEventListener('refreshAndRedirect', event => {
            window.location.href = event.detail.url;
        });
    </script>

<footer>
    <div class="container mx-auto px-4 text-center">
        <div class="mx-auto mb-4" style="max-width: 400px; height: 30px; background-image: url('{{ asset('images/footer.png') }}'); background-size: cover; background-position: center;"></div>
        <p>CSC348 COURSEWORK &copy; 2024 RAY RAY RACHEL. All rights reserved.</p>
    </div>
</footer>




</body>

</html>
