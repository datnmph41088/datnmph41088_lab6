<?php

namespace Database\Seeders;

use App\Models\Genes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Action', 'Adventure', 'Comedy', 'Drama', 'Horror', 'Mystery'];

        foreach ($genres as $genre) {
            Genes::create(['name' => $genre]);
        }
    }
}
