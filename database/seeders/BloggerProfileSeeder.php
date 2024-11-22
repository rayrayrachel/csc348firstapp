<?php
namespace Database\Seeders;

use App\Models\BloggerProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloggerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usersWithoutProfile = User::doesntHave('bloggerProfile')->get();

        foreach ($usersWithoutProfile as $user) {
            BloggerProfile::factory()
                ->forUser($user->id, $user->name) // Pass user_id and user_name
                ->create();
        }
    }
}