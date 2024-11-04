<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::factory()
            ->count(10)
            ->create()
            ->each(function ($project) {
               
                $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $project->categories()->attach($categories);
            });
    }
}
