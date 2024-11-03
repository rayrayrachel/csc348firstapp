<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloggerProfile>
 */
class BloggerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blogger_id' => fake()->numberBetween(1,10),
            'bio' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'profile_picture' => $this->faker->imageUrl(640, 480, 'people'),
            'location' => $this->faker->city(),
            'date_of_birth' => $this->faker->date('Y-m-d', '2000-01-01'),
        ];
    }
}
