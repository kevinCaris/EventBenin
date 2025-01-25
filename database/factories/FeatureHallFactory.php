<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureHall>
 */
class FeatureHallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature_id' => Feature::all()->random()->id,
            'hall_id' => Hall::all()->random()->id,
        ];
    }
}
