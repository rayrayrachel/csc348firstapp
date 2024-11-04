<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blogger_id' => fake()->numberBetween(1, 10),
            'title' => fake()->sentence(), 
            'description' => fake()->paragraph(),
            

            'status' => fake()->randomElement(['ongoing', 'completed', 'pending']),
            'featureimage' => fake()->imageUrl(640, 480, 'projects', true), 
            'methodology_used' => fake()->word(), 
            'project_link' => fake()->url(), 
        ];
    }
}
