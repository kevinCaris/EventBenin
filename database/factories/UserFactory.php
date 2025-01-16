<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusProprietorEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

     /**
     * The current password being used by the factory.
     */

     protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'gender' => $this->faker->randomElement(GenderEnum::cases())->value,
            'birthday' => fake()->dateTimeBetween('-80 years', 'now')->format('Y-m-d'),
            'avatar' => null,
            'birthday' => fake()->dateTimeBetween('-80 years', 'now'),
            'role' => $this->faker->randomElement(RoleEnum::cases())->value,
            'status_proprietor' => StatusProprietorEnum::PENDING->value,
            'password' => static::$password ??= Hash::make('password'),
            'company_id' => null,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
