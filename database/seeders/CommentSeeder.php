<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Blogger; 
use App\Models\Project;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {

        if (Blogger::count() > 0 && Project::count() > 0) {
            Comment::factory()->count(10)->create(); 
        }
    }
}
