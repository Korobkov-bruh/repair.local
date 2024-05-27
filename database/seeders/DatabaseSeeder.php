<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(
            [
                ServicesSeeder::class,
                ReviewSeeder::class,
                OfficeSeeder::class,
            ]
        );
        User::factory(1)->admin()->create();
    }
}
