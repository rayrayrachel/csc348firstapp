<div wire:ignore>
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('music/backgroundMusic.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        const music = document.getElementById('background-music');

    </script>
</div>
