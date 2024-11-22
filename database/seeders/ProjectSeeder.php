<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        
        $user = User::all();
        $categories = Category::all();

 
        if ($user->isNotEmpty() && $categories->isNotEmpty()) {
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
