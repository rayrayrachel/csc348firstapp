<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="page-header">
                {{ __('All Projects') }}
            </h2>
        </x-slot>
        <div class="page-container">
            <div class="element-container">
                @livewire('project-list', ['context' => 'all-projects'])
            </div>
        </div>
    </x-app-layout>
</div>
