<?php

namespace Database\Seeders;

use App\Models\EventType;
use App\Models\EventTypePrice;
use App\Models\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $hall = Hall::inRandomOrder()->first() ?? Hall::factory()->create();
        $eventType = EventType::inRandomOrder()->first() ?? EventType::factory()->create();

        EventTypePrice::firstOrCreate(
            [
                'event_type_id' => $eventType->id,
                'hall_id' => $hall->id,
            ],
            [
                'price' => fake()->randomFloat(2, 50, 500) // Génération d'un prix aléatoire
            ]
        );
            }
}
