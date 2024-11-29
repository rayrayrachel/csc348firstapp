<div>
  <h2>{{ __('Comments') }}</h2>

    @if($comments->isEmpty())
        <p>No comments yet. Be the first to comment!</p>
    @else
        <ul>
            @foreach($comments as $comment)
                <li class="comment-container">
                    <p><strong>{{ $comment->user->name }}</strong> says:</p>
                    <p>{{ $comment->content }}</p>
                    <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>