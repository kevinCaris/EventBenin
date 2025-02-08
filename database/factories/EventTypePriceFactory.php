<?php

namespace Database\Factories;

use App\Models\EventType;
use App\Models\EventTypePrice;
use App\Models\Hall;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTypePrice>
 */
class EventTypePriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_type_id' => \App\Models\EventType::inRandomOrder()->first()->id, // Assurez-vous que l'ID d'EventType existe
            'hall_id' => \App\Models\Hall::inRandomOrder()->first()->id, // Assurez-vous que l'ID de Hall existe
            'price' => $this->faker->randomFloat(2, 50, 500), //        // Génération d'un prix aléatoire
        ];

    }
}
