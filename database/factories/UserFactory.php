<?php

namespace Database\Factories;

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
            'password' => static::$password ??= Hash::make('password'),
            'avatar' => fake()->imageUrl(100, 100, 'people', true),
            'remember_token' => Str::random(10),
            'about' => fake()->paragraph(5),
            'company' => fake()->company(),
            'job' => fake()->jobTitle(),
            'country' => fake()->country(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'twitter' => fake()->url(),
            'facebook' => fake()->url(),
            'linkedin' => fake()->url(),
            'instagram' => fake()->url(),
            'is_admin' => rand(0, 1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
