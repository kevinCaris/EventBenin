<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_type' => $this->faker->randomElement(['Mariage', 'Anniversaire', 'Séminaire', 'Conférence', 'Afterwork']),
            'start_date' => $this->faker->dateTimeBetween('+1 days', '+30 days')->format('Y-m-d'),
            'end_date' => Carbon::parse($this->faker->dateTimeBetween('+1 days', '+30 days'))->addHours(rand(5, 8))->format('Y-m-d'),
            'start_time' => $this->faker->time('H:i:s', '08:00'),
            'end_time' => $this->faker->time('H:i:s', '20:00'),
            'details' => $this->faker->paragraph,
            'status' => $this->faker->boolean,
            'amount' => $this->faker->numberBetween(1000, 10000),
            'user_id' => User::inRandomOrder()->first()->id,  // Assure-toi que des utilisateurs existent
            'hall_id' => Hall::inRandomOrder()->first()->id,  // Assure-toi que des salles existent
        ];
    }
}
