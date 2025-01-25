<?php

namespace Database\Factories;

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
            'location' => json_encode([
                'latitude' => fake()->latitude(),
                'longitude' => fake()->longitude(),
                'address' => fake()->address(),
            ]),
            'price' => fake()->randomFloat(2, 0, 100),
            'image' => null,
            'address' => fake()->address(),
            'company_id' => $company->id
        ];
    }
}
