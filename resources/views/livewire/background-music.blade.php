<div wire:ignore>
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('music/backgroundMusic.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        const music = document.getElementById('background-music');

        // Resume playback from the stored timestamp
        music.currentTime = @js($currentTime);

        // Save playback time periodically
        setInterval(() => {
            if (!music.paused) {
                Livewire.emit('updateTime', music.currentTime);
            }
        }, 1000);
    </script>
</div>
