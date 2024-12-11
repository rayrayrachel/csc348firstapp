    <div>
        <form wire:submit.prevent="createProject">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="form-group">
                <label for="title">Title <span class="text-red-500">*</span></label>
                <input type="text" id="title" wire:model="title" placeholder="Enter project title" />
                @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description <span class="text-red-500">*</span></label>
                <textarea id="description" wire:model="description" placeholder="Enter project description"></textarea>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" wire:model="status" class="form-select" placeholder="Select project status">
                    <option value="">Select Status</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="categories">Categories</label>
                <div class="flex space-x-4 items-center">
                    <select id="categories" wire:model="selectedCategory"
                        class="form-select w-full border-gray-300 rounded">
                        <option value="">Select a Category</option>
                        @foreach ($allCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <button type="button" wire:click="addCategory" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Add
                    </button>
                </div>

                <div class="mt-4">
                    @foreach ($selectedCategories as $id => $name)
                        <span class="inline-flex items-center bg-gray-200 text-gray-700 rounded px-3 py-1 mb-2 mr-2">
                            {{ $name }}
                            <button type="button" wire:click="removeCategory({{ $id }})"
                                class="ml-2 text-red-500 font-bold">
                                &times;
                            </button>
                        </span>
                    @endforeach
                </div>
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
                        <img src="{{ $featureimage->temporaryUrl() }}" alt="Image Preview"
                            style="max-width: 100%; height: auto; border: 1px solid #ccc;" />
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="methodology_used">Methodology Used</label>
                <input type="text" id="methodology_used" wire:model="methodology_used"
                    placeholder="Methodology used" />
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
