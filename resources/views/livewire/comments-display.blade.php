<div>
    @if ($comments->isEmpty())
        <p>No comments yet.</p>
    @else
        <ul>
            @foreach ($comments as $comment)
                <li class="comment-container">
                    <div class="comment-pfp">
                        <div class="comment-profile-picture-container">
                            @if ($comment->user->bloggerProfile->profile_picture)
                                <img src="{{ asset('storage/' . $comment->user->bloggerProfile->profile_picture) }}"
                                     alt="Profile picture of {{ $comment->user->bloggerProfile->user_name }}"
                                     class="profile-picture">
                            @else
                                <img src="{{ asset('images/default-pfp.gif') }}" alt="Default project image"
                                     class="profile-picture">
                            @endif
                        </div>
                    </div>

                    <div class="comment-text">
                        <p><strong>{{ $comment->user->name }}</strong> says:</p>
                        <p>{{ $comment->content }}</p>
                        <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $comments->links() }}
        </div>
    @endif
</div>
