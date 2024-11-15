<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BloggerProfile;
use Illuminate\Database\Seeder;

class BloggerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if (User::count() > 0) {
            BloggerProfile::factory()->count(10)->create();
        }
    }
}
