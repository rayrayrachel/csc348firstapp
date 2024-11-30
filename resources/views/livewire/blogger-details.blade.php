<div>

    <x-slot name="header">
        <h2 class="page-header">
            {{ $profile->user_name }} {{ __('\'s Blog') }}
        </h2>
    </x-slot>


    <div class="page-container">
        <div class="blogger-profile">

            <div class="element-container">
                @livewire('display-blogger-profile', ['userId' => $profile->id])
            </div>

            <div class="element-container">
                @livewire('statistics', ['userId' => $profile->id])
            </div>

            <div class="element-container">

                <div id="projectContainer" class=" transition-all">
                    <h2>{{ __('Project List') }}</h2>
                    <div class="container">
                        @livewire('project-list', ['userId' => $profile->user_id, 'context' => 'other-bloggers-projects'])
                    </div>
                </div>

                <div id="commentContainer" class="hidden transition-all">
                    <h2>{{ __('Comment List') }}</h2>
                    @livewire('comments-display', ['userId' => Auth::id()])
                </div>

            </div>

        </div>
    </div>


</div>

<script>
    Livewire.on('projectsClicked', () => {
        const projectDiv = document.getElementById("projectContainer");
        const commentDiv = document.getElementById("commentContainer");

        projectDiv.style.display = "";
        commentDiv.style.display = "none";
    });

    Livewire.on('commentsClicked', () => {
        const projectDiv = document.getElementById("projectContainer");
        const commentDiv = document.getElementById("commentContainer");

        commentDiv.style.display = "";
        projectDiv.style.display = "none";
        commentDiv.classList.remove("hidden");
    });
</script>
