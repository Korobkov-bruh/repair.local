<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail>
 */
class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // предложение от 2 до 5 случайных слов
            'name' => fake()->text(5),
            // случайная цена от 500 до 5000
            'value' => fake()->text(15),
            // описание из 1 предложения
            'description' => fake()->paragraph(1, true),
        ];
    }

    /**
     * Состояние для имени
     */
    public function name()
    {
        return $this->state(
            fn (array $attributes) => [
                'name' => 'name',
                'value' => 'ИП Столбов С.Ю.',
                'description' => 'Название индивидуального предпринимателя',
            ]
        );
    }

    /**
     * Состояние для ИНН
     */
    public function inn()
    {
        return $this->state(
            fn (array $attributes) => [
                'name' => 'inn',
                'value' => fake()->inn(),
                'description' => 'ИНН индивидуального предпринимателя',
            ]
        );
    }
}
