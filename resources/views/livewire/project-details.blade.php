<div>
    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="page-container">

        <div class="element-container" id="projectDetailsContainer">

            @livewire('blogger-p-f-p', ['userId' => $project->user->id])

            <div class="flex justify-between items-center overflow-hidden">
                <h2 class="truncate max-w-[calc(100%-100px)]">{{ $project->title }}</h2>

                @if ($project->status)
                    <div class="project-status bg-gray-200 text-sm text-white px-3 py-1 rounded">
                        {{ $project->status }}
                    </div>
                @endif

            </div>
            <div>
                @if ($project->categories->isNotEmpty())
                    <div> Project Categories:
                        @foreach ($project->categories as $category)
                            <span class="category">{{ $category->name }}</span>
                            @if (!$loop->last)
                                <span> </span>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="overflow-hidden">
                <p class="text-description break-words">{{ $project->description }}</p>
            </div>

            @if ($project->featureimage)
                <img src="{{ asset('storage/' . $project->featureimage) }}"
                    alt="Feature image of {{ $project->title }}">
            @endif

            @if ($project->methodology_used)
                <p class="text-description">Methodology Used: {{ $project->methodology_used }}</p>
            @endif

            <p class="timestamp">Created At: {{ $project->created_at->diffForHumans() }}</p>
            <p class="timestamp">Updated At: {{ $project->updated_at->diffForHumans() }}</p>
            <p class="author">
                Author: {{ $project->user->name ?? 'Unknown User' }}
            </p>

            @if ($project->project_link)
                <p class="link">External Link To This Project:
                    <a href="{{ $project->project_link }}" target="_blank">
                        {{ $project->project_link }}
                    </a>
                </p>
            @endif
        </div>

        <div class="element-container">

            <div class="flex justify-between items-center ">
                <h2>{{ __('Comments') }}</h2>

                @auth
                    <button id="toggleCommentButton" onclick="toggleCreateCommentForm()"
                        class="bg-[#36c73b] text-white py-2 px-4 rounded">
                        Add Comment
                    </button>
                @endauth

            </div>

            <div class="flex">
                <div id="commentList" class="w-full  transition-all">
                    @livewire('comments-display', ['projectId' => $project->id])
                </div>

                <div id="createCommentForm" class="w-1/3 h-max hidden transition-all">
                    @livewire('create-comment', ['projectId' => $project->id])
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleCreateCommentForm() {
        const form = document.getElementById("createCommentForm");
        const button = document.getElementById("toggleCommentButton");
        const commentList = document.getElementById("commentList");
        const commentsContainer = document.getElementById("commentsContainer");

        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
            button.textContent = "Close Comment Form";
            commentList.classList.add("lg:w-2/3");
            button.classList.remove("bg-[#36c73b]");
            button.classList.add("bg-gray-300");
            commentsContainer.classList.add("min-h-[100rem]");
        } else {
            form.style.display = "none";
            button.textContent = "Add Comment";
            commentList.classList.remove("lg:w-2/3");
            button.classList.remove("bg-gray-300");
            button.classList.add("bg-[#36c73b]");
        }
    }
</script>
