<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'site_name' => "Blogging",
            'site_logo' => fake()->imageUrl(),
            'facebook' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'github' => 'https://github.com',
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'about_title' => fake()->sentence(),
            'about_content' => fake()->paragraphs(4, true),
        ];
    }
}
