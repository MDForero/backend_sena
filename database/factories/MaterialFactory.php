<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Pan', 'Carne', 'Queso', 'Lechuga', 'Tomate', 'Cebolla', 'Salsa', 'Mayonesa', 'Mostaza', 'Ketchup', 'Papas Fritas', 'Salchipapa', 'Salchicha', 'Salchicha de Pollo', 'Salchicha de Cerdo', 'Salchicha de Res', 'Salchicha de Pavo', 'Salchicha de Tofu', 'Salchicha de Soya', 'Salchicha de Pescado', 'Salchicha de Camarón', 'Salchicha de Cangrejo', 'Salchicha de Langosta', 'Salchicha de Cordero', 'Salchicha de Cabra', 'Salchicha de Venado']),
            'quantity' => fake()->randomFloat(2, 0, 1000),
        ];
    }
}
