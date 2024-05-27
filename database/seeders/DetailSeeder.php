<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // имя ИП
        Detail::factory()
            ->count(1)
            ->name()
            ->create();

        // ИНН ИП
        Detail::factory()
            ->count(1)
            ->inn()
            ->create();
    }
}
