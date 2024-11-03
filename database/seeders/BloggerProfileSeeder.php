<?php

namespace Database\Seeders;

use App\Models\BloggerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloggerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BloggerProfile::factory()->count(10)->create();
    }
}
