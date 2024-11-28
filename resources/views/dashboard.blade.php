<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="page-container">
            <div class="element-container">
                <livewire:display-blogger-profile />
            </div>

            <div class="element-container">
                <livewire:statistics />
            </div>
            <div class="element-container">

                <div class="flex justify-between items-center ">
                    <h2>{{ __('Project List') }}</h2>
                    <button id="toggleButton" onclick="toggleCreateProjectForm()" class="create-project-btn bg-[#36c73b]">
                        Create Project
                    </button>
                </div>

                <div class="flex">
                    <div id="projectList" class="w-full  transition-all">
                        @livewire('project-list', ['authOnly' => true, 'context' => 'dashboard'])
                    </div>

                    <div id="createProjectForm" class=" hidden transition-all">

                        <div class="element-container">
                            @livewire('create-project')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
</x-app-layout>

<script>
    function toggleCreateProjectForm() {
        const form = document.getElementById("createProjectForm");
        const button = document.getElementById("toggleButton");
        const projectList = document.getElementById("projectList");

        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
            button.textContent = "Close Project Form";
            projectList.classList.add("lg:w-2/3");
            button.classList.remove("bg-[#36c73b]");
            button.classList.add("bg-gray-300");
        } else {
            form.style.display = "none";
            button.textContent = "Create Project";
            projectList.classList.remove("lg:w-2/3");
            button.classList.remove("bg-gray-300");
            button.classList.add("bg-[#36c73b]");
        }
    }

</script>
