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
                        <p>
                            <a href="{{ route('bloggers.profile', $comment->user->id) }}">
                                <strong>{{ $comment->user->name }}</strong>
                            </a>
                            says on project:
                            <a href="{{ route('project.details', $comment->project->id) }}">
                                <strong>{{ $comment->project->title }}</strong>
                            </a>
                        </p>

                        <p>{{ $comment->content }}</p>
                        <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>

                        @if ($editingCommentId === $comment->id)
                            <div wire:key="comment-{{ $comment->id }}">
                                @livewire('edit-comment', ['comment' => $comment], key('edit-comment-' . $comment->id))
                            </div>
                        @endif
                    </div>

                    <div class="px-3 ">
                        @livewire('like-button', ['likeable' => $comment], key('like-button-' . $comment->id))

                        @if (Auth::id() == $comment->user_id)
                            <div class="goto">
             
                                <button wire:click="toggleEditForm({{ $comment->id }})"
                                    class="edit-button {{ $editingCommentId === $comment->id ? 'btn-danger' : 'edit-button-toggle' }}">
                                    {{ $editingCommentId === $comment->id ? 'QUIT' : 'EDIT' }}
                                </button>
                            </div>
                        @endif
                    </div>





                </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $comments->links() }}
        </div>
    @endif
</div>
