<?php

namespace Database\Factories;

use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallAvailability>
 */
class HallAvailabilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::now()->addDays($this->faker->numberBetween(1, 30));
        $end = (clone $start)->addHours($this->faker->numberBetween(1, 8));
        $hall_id = Hall::inRandomOrder()->first()->id;

        return [
            'hall_id'    => $hall_id,
            'start_date' => $start,
            'end_date'   => $end,
            'status'     => 'disponible',
        ];
    }
}
