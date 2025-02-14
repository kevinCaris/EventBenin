<?php

namespace Database\Seeders;

use App\Models\Events;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Events::factory()->count(10)->create();
    }
}
