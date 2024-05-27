<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'text' => fake()->text(200),
            'rating' => fake()->numberBetween(1, 10),
            'email' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement(
                [
                    'Новый',
                    'Модерация',
                    'Опубликован',
                    'Отклонен'
                ]
            ),
        ];
    }
}
