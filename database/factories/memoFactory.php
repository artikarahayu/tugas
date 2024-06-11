<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\memo>
 */
class memoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mata_kuliah' => fake()->sentence,
            'deskripsi' => fake()->paragraph,
            'semester' => fake()->boolean,
        ];
    }
}