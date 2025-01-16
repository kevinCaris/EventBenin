<?php

namespace Database\Factories;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HallPictures>
 */
class HallPicturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hall = Hall::inrandomOrder()->first() ?? Hall::factory()->create();
        return [
            'path' => fake()->imageUrl(),
            'hall_id' => $hall->id,
        ];
    }
}
