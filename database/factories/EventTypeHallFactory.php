<?php

namespace Database\Factories;

use App\Models\EventType;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTypeHall>
 */
class EventTypeHallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_type_id' => EventType::all()->random()->id,
            'hall_id' => Hall::all()->random()->id,
        ];
    }
}
