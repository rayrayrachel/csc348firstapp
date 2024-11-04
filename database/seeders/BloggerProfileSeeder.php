<?php

namespace Database\Seeders;

use App\Models\Blogger;
use App\Models\BloggerProfile;
use Illuminate\Database\Seeder;

class BloggerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if (Blogger::count() > 0) {
            BloggerProfile::factory()->count(10)->create();
        }
    }
}
