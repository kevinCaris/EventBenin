<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\FeatureHall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeatureHall::factory(20)->create();
    }
}
