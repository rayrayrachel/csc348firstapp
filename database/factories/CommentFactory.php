<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Blogger;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{


    public function definition(): array
    {
        return [
            'blogger_id'  => fake()->numberBetween(1,10),

            'content' => $this->faker->paragraph(),
        ];
    }
}
