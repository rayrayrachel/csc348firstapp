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
            'bio' => fake()->paragraph(),
            'website' => fake()->url(),
            'profile_picture' => fake()->imageUrl(640, 480, 'people'),
            'location' => fake()->city(),
            'date_of_birth' => fake()->date('Y-m-d', '2000-01-01'),
        ];
    }
}
