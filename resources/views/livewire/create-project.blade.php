<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createProject" class="create-project-form">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title" placeholder="Enter project title" />
            @error('title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" wire:model="description" placeholder="Enter project description"></textarea>
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" id="status" wire:model="status" placeholder="Enter project status" />
            @error('status')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="featureimage">Featured Image</label>
            <input type="file" id="featureimage" wire:model="featureimage" />
            @error('featureimage')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            @if ($featureimage)
                <div>
                    <label>Preview:</label>
                    <img src="{{ $featureimage->temporaryUrl() }}" alt="Image Preview" style="max-width: 100%; height: auto; border: 1px solid #ccc;" />
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="methodology_used">Methodology Used</label>
            <input type="text" id="methodology_used" wire:model="methodology_used" placeholder="Methodology used" />
            @error('methodology_used')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_link">Project Link</label>
            <input type="url" id="project_link" wire:model="project_link" placeholder="Enter project link" />
            @error('project_link')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="submit-btn">Create Project</button>
    </form>
</div>
