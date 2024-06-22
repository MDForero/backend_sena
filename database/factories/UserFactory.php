<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'imgProfile' => fake()->randomElement(
                [
                    'profiles/4Wo7TfDN2p7w9m0aJA2G4MSVyIuTaPN7bDVyRqHs.jpg',
                    'profiles/92oeKSPiim2bjBORicFJ5m2kkK9DqrdsjT4MKG5s.jpg',
                    'profiles/Enolm5XYhR35vss1X5OR4NFw9Jwi16JMH7pX73v9.jpg',
                    'profiles/gqChMrgbzHWFLcqlkFrbGU6R8R3GRn8hQZWQDIaE.jpg',
                    'profiles/hJbbr9V1y0oYpRkErsI4l6AW8xTYeHaMPUXGE5iz.jpg',
                    'profiles/MfWB2nb4O5CZTXmfcyqpLF6FVsFukg4wF1pbvIeG.jpg',
                    'profiles/us4OIISFXp4IwhhSA3YOqEGgdqjM8MHm1bqJgdoI.jpg',
                ]
            ),
            'remember_token' => Str::random(10),
            'nit' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
