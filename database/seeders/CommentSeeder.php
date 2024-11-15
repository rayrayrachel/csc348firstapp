<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User; 
use App\Models\Project;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {

        if (User::count() > 0 && Project::count() > 0) {
            Comment::factory()->count(10)->create(); 
        }
    }
}
