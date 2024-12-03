<div >
    <form wire:submit.prevent="updateComment">
        <textarea wire:model="content" rows="1" class="form-control">{{ $content }}</textarea>
        <button type="submit" class="update-comment-button ">Update Comment</button>
    </form>
</div>
