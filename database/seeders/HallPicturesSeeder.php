<?php

namespace Database\Seeders;

use App\Models\HallPictures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallPicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HallPictures::factory()->count(20)->create();
    }
}
