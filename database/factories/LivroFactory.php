<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Titulo' => fake()->text(40),
            'Editora' => fake()->text(40),
            'Edicao' => fake()->randomDigit(),
            'AnoPublicacao' => fake()->year(),
        ];
    }
}
