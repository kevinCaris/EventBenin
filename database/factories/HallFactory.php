<?php

namespace Database\Factories;

use App\Enums\StatusHallEnum;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = Company::inrandomOrder()->first() ?? Company::factory()->create();
        return [
            'title' => fake()->company(),
            'description' => fake()->text(),
            'capacity' => fake()->randomNumber(),
            'image' => null,
            'address' => fake()->address(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'website' => fake()->url(),
            'capacity' => fake()->randomNumber(),
            'price' => fake()->randomFloat(2, 0, 100),
            'tarification' =>fake()->text(),
            'status' => StatusHallEnum::AVAILABLE->value,
            'company_id' => $company->id
        ];
    }
}
