<?php

namespace Database\Seeders;

use App\Models\EventTypeHall;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventTypeHall::factory()->count(20)->create();
    }
}
