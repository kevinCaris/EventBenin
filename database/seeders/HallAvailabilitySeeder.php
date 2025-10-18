<?php

namespace Database\Seeders;

use App\Models\HallAvailability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HallAvailability::factory()->count(20)->create();
    }
}
