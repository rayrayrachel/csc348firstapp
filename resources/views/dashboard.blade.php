<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="page-header">
                {{ __('Dashboard') }}
            </h2>
            <button id="toggleButton" onclick="toggleForm()" class="create-project-btn bg-[#36c73b]">
                Create Project
            </button>
        </div>
    </x-slot>

    @section('content')
        <div class="page-container">



            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <div class="flex space-x-4">

                    <div id="projectList" class="w-full  transition-all">
                        <div class="py-3">

                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <section>
                                        <h2>Stats</h2>
                                        <p>Total Projects: {{ $stats['total_projects'] }}</p>
                                    </section>
                                </div>
                            </div>
                        </div>
                        @livewire('project-list', ['authOnly' => true])
                    </div>

                    <div id="createProjectForm" class=" hidden transition-all">
                        @livewire('create-project')
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

<script>
    function toggleForm() {
        const form = document.getElementById("createProjectForm");
        const button = document.getElementById("toggleButton");
        const projectList = document.getElementById("projectList");

        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
            button.textContent = "Close Form";
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
