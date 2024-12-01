<div>
    @if ($comments->isEmpty())
        <p>No comments yet.</p>
    @else
        <ul>
            @foreach ($comments as $comment)
                <li class="comment-container">
                    <a href="{{ route('bloggers.profile', $comment->user->id) }}">
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
                    </a>
                    
                    <div class="comment-text">
                        <p><strong class="">{{ $comment->user->name }}</strong> says on project: <strong>{{ $comment->project->title }}</strong> </p>
                        <p>{{ $comment->content }}</p>
                        <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>


         {{-- <div class="px-3">
                            @livewire('like-button', ['likeable' => $comment])
                        </div> --}}
                    <div class="goto">
                        <a href="{{ route('project.details', $comment->project->id) }}">
                            <button class="goto-button">
                                GO TO PROJECT
                            </button>
                        </a>
                    </div>

                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $comments->links() }}
        </div>
    @endif
</div>
