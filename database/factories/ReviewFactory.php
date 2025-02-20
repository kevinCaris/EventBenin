<?php

namespace Database\Factories;

use App\Models\Hall;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hall_id' => Hall::inRandomOrder()->first()?->id ?? 1, // Une salle existante ou 1 par défaut
            'nom' => fake()->name(),
            'email' => fake()->safeEmail(),
            'user_id' => User::inRandomOrder()->first()?->id, // Un utilisateur existant ou null
            'commentaire' => fake()->sentence(),
            'note' => fake()->numberBetween(1, 5),
        ];
    }
}
