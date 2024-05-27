<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // создать 15 записей
        Application::factory()
            ->count(15)
            ->create();
    }
}
