<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="page-header">
                {{ __('Project Details') }}
            </h2>
        </x-slot>

        <div class="page-container">

            <div class="element-container" id="projectDetailsContainer">
                <h2>{{ $project->title }}</h2>
                <p class="text-description">Description: {{ $project->description }}</p>

                @if ($project->featureimage)
                    <img src="{{ asset('storage/' . $project->featureimage) }}"
                        alt="Feature image of {{ $project->title }}">
                @endif

                <p class="text-description">Methodology Used: {{ $project->methodology_used }}</p>
                <p class="timestamp">Created At: {{ $project->created_at->diffForHumans() }}</p>
                <p class="timestamp">Updated At: {{ $project->updated_at->diffForHumans() }}</p>
                <p class="author">
                    Blogger: {{ $project->user->name ?? 'Unknown User' }}
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
                    <button id="toggleCommentButton" onclick="toggleCreateCommentForm()"
                        class="bg-[#36c73b] text-white py-2 px-4 rounded">
                        Add Comment
                    </button>
                </div>

                <div class="flex">
                    <div id="commentList" class="w-full  transition-all">
                        @livewire('comments-display', ['projectId' => $project->id])
                    </div>

                    <div id="createCommentForm"class=" w-1/3 h-max hidden transition-all">
                        @livewire('create-comment', ['projectId' => $project->id])
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
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
