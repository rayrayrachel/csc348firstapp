<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;



class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dog = new Animal;
        $dog->name = "Scooby Doo";
        $dog->weight = 600.0;
        $dog->save();

        Animal::factory()->count(50)->create();
    }
}
