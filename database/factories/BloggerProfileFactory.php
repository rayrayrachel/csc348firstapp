<?php

namespace Database\Factories;

use App\Models\BloggerProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloggerProfile>
 */
class BloggerProfileFactory extends Factory
{
    protected $model = BloggerProfile::class;

    public function definition(): array
    {

        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id, 
            'user_name' => $user->name,
            'bio' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'profile_picture' => $this->faker->imageUrl(640, 480, 'people'),
            'location' => $this->faker->city(),
            'date_of_birth' => $this->faker->date('Y-m-d', '2000-01-01'),
        ];
    }
}
