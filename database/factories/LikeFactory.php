<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Like;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Like::class;

    public function definition(): array
    {

        $userIds = User::pluck('id')->toArray();

        $likable = $this->faker->randomElement([
            Project::class,
            Comment::class,
        ]);

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'likable_id' => $likable::factory(),
            'likable_type' => $likable,
        ];
    }
}
