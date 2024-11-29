<div>

    @if ($comments->isEmpty())
        <p>No comments yet. Be the first to comment!</p>
    @else
        <ul>
            @foreach ($comments as $comment)
                <li class="comment-container">
                    <p><strong>{{ $comment->user->name }}</strong> says:</p>
                    <p>{{ $comment->content }}</p>
                    <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $comments->links() }}
        </div>
    @endif
</div>
