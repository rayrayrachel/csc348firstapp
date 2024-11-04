<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Blogger;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [

            'blogger_id' => Blogger::inRandomOrder()->value('id'),

            'project_id' => Project::inRandomOrder()->value('id'),
            'content' => $this->faker->paragraph(),
        ];
    }
}
