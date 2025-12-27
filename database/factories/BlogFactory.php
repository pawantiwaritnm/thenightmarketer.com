<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'subtitle' => fake()->sentence(),
            'desc' => fake()->paragraph(),
            'date' => fake()->date(),
            'sortOrder' => fake()->numberBetween(0, 10),
            'image' => fake()->imageUrl(),
            'author_id' => fake()->numberBetween(1, 10),
            'metaTitle' => fake()->sentence(),
            'metaKeyword' => fake()->sentence(),
            'metaDesc' => fake()->sentence(),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
