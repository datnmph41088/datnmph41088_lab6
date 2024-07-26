<?php

namespace Database\Seeders;

use App\Models\Genes;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $genes = Genes::all();

        foreach (range(1, 50) as $index) {
            Movie::create([
                'title' => $faker->sentence(3),
                'poster' => $faker->imageUrl(640, 480),
                'intro' => $faker->text(200),
                'release_date' => $faker->date(),
                'genes_id' => $genes->random()->id,
            ]);
        }
    }
}
