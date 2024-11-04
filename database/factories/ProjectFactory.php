<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Blogger;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'blogger_id' => Blogger::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['ongoing', 'completed', 'pending']),
            'featureimage' => $this->faker->imageUrl(640, 480, 'projects', true),
            'methodology_used' => $this->faker->word(),
            'project_link' => $this->faker->url(),
        ];
    }
}
