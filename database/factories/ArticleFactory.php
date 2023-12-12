<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Hamburguesa Mixta', 'Perro Caliente', 'Encocado de Carne', 'Pan de dios' ]),
            'description' => fake()->text(),
            'value' => fake()->randomFloat(2, 0, 1000),
            'image' => fake()->randomElement(['xiGRAUsV4gbfK6jhydBn3UJ8JGJGLzLg.jpg', 'Wo0GKh5wDqIdSy2FMQu8s29GGnOC6bcU.jpg', 'Wa8nHDBaASzeajZZmi3lc24y1Q3pgB2M.jpg', 'VxFwGYHzZ4q07egJnmolq6j7tyjIGDTN.jpg', 'lNK1YHygovEqLAkOWfnolIUyNM7KDys3.jpg', 'rSnyvebYniyIhWkdwSbe94TB7IKInD9j.jpg', 'Cp3pRua9P6gquNYlePcOPBz9B14wI5B8.jpg', 'aykC4cyDagdnqRZzpe8Y7bJkCjJ7xaYl.jpg']),
            'category' => fake()->randomElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
