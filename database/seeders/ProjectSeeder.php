<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use App\Models\Blogger;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        
        $bloggers = Blogger::all();
        $categories = Category::all();

 
        if ($bloggers->isNotEmpty() && $categories->isNotEmpty()) {
            Project::factory()
                ->count(10)
                ->create()
                ->each(function ($project) use ($categories) {
                  
                    $project->categories()->attach(
                        $categories->random(rand(1, 3))->pluck('id')->toArray()
                    );
                });
        }
    }
}
