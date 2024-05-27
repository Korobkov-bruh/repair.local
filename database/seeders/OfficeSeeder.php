<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // создать офис Оршанка
        Office::factory()
            ->count(1)
            ->orshanka()
            ->hasUsers(1, ['position' => 'master'])
            ->hasUsers(1, ['position' => 'seller'])
            ->create();

        // создать офис Юрино
        Office::factory()
            ->count(1)
            ->yurino()
            ->hasUsers(1, ['position' => 'master'])
            ->hasUsers(1, ['position' => 'seller'])
            ->create();
    }
}
