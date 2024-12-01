<div>
    <button 
        wire:click="toggleLike" 
        class="flex items-center space-x-2 text-lg {{ $isLiked ? 'text-red-500' : 'text-gray-500' }} hover:text-red-700">
        <i class="fas fa-heart"></i>
        <span>{{ $likeCount }}</span> 
    </button>
</div>
