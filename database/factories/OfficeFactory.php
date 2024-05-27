<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(15),
            'address' => fake()->address(),
            'phone' => fake()->e164PhoneNumber(),
            'hours' => 'понедельник – пятница с 8.30 до 17.00, обед с 12.00 до 13.00; суббота с 8.30 до 13.00.',
            'social' => fake()->url(),
            'map' => fake()->url(),
        ];
    }

    /**
     * Состояние Оршанка
     *
     * @return Factory
     */
    public function orshanka()
    {
        return $this->state(
            fn (array $attributes) => [
                'name' => 'пгт. Оршанка',
                'address' => '425250, Республика Марий Эл, пгт. Оршанка, ул. Советская ул. д. 126, 2-й этаж.',
                'phone' => '+7 (902) 744 98 97',
                'hours' => 'понедельник – пятница с 8.30 до 17.00, обед с 12.00 до 13.00; суббота с 8.30 до 13.00.',
                'social' => 'https://vk.com/pronote_orshanka',
                'map' => '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abe6f36de274a72adfb1840fa37d85ac6c6dddaf3cc943ef38cd00ce5d4ca759a&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>',
            ]
        );
    }

    /**
     * Состояние Юрино
     *
     * @return Factory
     */
    public function yurino()
    {
        return $this->state(
            fn (array $attributes) => [
                'name' => 'пгт. Юрино',
                'address' => '425370, Республика Марий Эл, пгт. Юрино, Центральный проспект, д. 11а.',
                'phone' => '+7 (995) 961 44 84',
                'hours' => 'понедельник – пятница с 8.00 до 17.00, обед с 12.00 до 13.00, суббота, воскресенье выходной',
                'social' => 'https://vk.com/pronote_yurino',
                'map' => '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa1510d5ddb64e4c2a3fa2141bb1150841d19630b177a0a5d556d7260e655f7d9&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>',
            ]
        );
    }
}
