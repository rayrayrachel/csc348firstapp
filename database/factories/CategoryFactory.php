<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {

        static $categories = [
            'Technology',
            'Healthcare',
            'Education',
            'Finance',
            'Entertainment',
            'Travel',
            'Science',
            'Art & Design',
            'Marketing',
            'Business',
            'Sports',
            'Environment',
            'Music',
            'Lifestyle',
            'Real Estate',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
