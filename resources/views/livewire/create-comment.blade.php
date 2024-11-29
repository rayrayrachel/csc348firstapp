<div class="w-full h-full">

    <form wire:submit.prevent="submitComment" class="bg-white p-4 rounded shadow-md flex flex-col h-full">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="flex-grow">
            <div class="form-group h-full">
                <textarea wire:model="content" class="w-full h-full p-2 border rounded resize-none" placeholder="Add a comment..."></textarea>
                @error('content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-4 text-right">
            <button type="submit" class="submit-btn bg-blue-500 text-white py-2 px-4 rounded">
                Submit Comment
            </button>
        </div>
    </form>
</div>
