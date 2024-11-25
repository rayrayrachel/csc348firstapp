<x-app-layout>
    <x-slot name="header">
        <h2 class="page-header">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section>
                            <h2>Stats</h2>
                            <p>Total Projects: {{ $stats['total_projects'] }}</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <button id="toggleButton" onclick="toggleForm()" class = "submit-btn">
                    Create Project
                </button>

                <div id="createProjectForm"  style="display: none;">
                    @livewire('create-project')
                </div>
            </div>
        </div>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                        <h3 class="text-lg font-medium text-gray-900">{{ __('Your Projects') }}</h3>
                        <x-project-list :projects="$projects" />

                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

<script>
    function toggleForm() {
        const form = document.getElementById("createProjectForm");
        const button = document.getElementById("toggleButton");

        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
            button.textContent = "Close Form"; 
        } else {
            form.style.display = "none";
            button.textContent = "Create Project"; 
        }
    }
</script>
