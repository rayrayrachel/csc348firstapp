<div>
    <h2>{{ __('Statistics') }}</h2>
    <div class="statistics">

        <div id="projectButton" class="stat-card"
            wire:click="handleProjectsClick">
            <h3>Total Projects</h3>
            <p>{{ $totalProjects }}</p>
        </div>

        <div id="commentButton" class="stat-card"
            wire:click="handleCommentsClick">
            <h3>Total Comments</h3>
            <p>{{ $totalComments }}</p>
        </div>
    </div>
</div>


