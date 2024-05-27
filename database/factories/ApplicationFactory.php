<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => fake()->company(),
            'fault' => fake()->text(15),
            'customer' => fake()->name(),
            'status' => fake()->randomElement(
                [
                    'Ремонт',
                    'Согласование',
                    'Выполнен',
                ]
            ),
            'user_id' => fake()->numberBetween(2, 4),
            'completion' => fake()->date('Y-m-d', 'now'),
        ];
    }
}
