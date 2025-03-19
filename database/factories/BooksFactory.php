<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'isbn' => $this->faker->isbn13(),
            'cover_image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'available' => $this->faker->numberBetween(1, 10),
        ];
    }
}
