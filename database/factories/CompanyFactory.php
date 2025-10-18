<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'description' => fake()->text(),
            'ville' => fake()->city(),
            'pays' => fake()->country(),
            'postal_code' => fake()->postcode(),
            'facebook_url' => fake()->url(),
            'twitter_url' => fake()->url(),
            'linkedin_url' => fake()->url(),
            'youtube_url' => fake()->url(),
            'tiktok_url' => fake()->url(),
            'instagram_url' => fake()->url(),
            'website_url' => fake()->url(),
            'cover' => null,
            'user_id' => null

        ];
    }
}
