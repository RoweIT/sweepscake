<?php

namespace Database\Seeders;

use App\Models\Baker;
use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $gbbo2021 = Series::factory()
            ->has(Baker::factory()->count(12))
            ->create([
                'start_on' => Date::create(2021, 9, 21),
                'name' => 'GBBO 2021 (Series 12)',
                'slug' => 'gbbo_2021',
            ]);

        $gbbo2022 = Series::factory()
            ->has(Baker::factory()->count(12))
            ->create([
                'start_on' => Date::create(2022, 9, 13),
                'name' => 'GBBO 2022 (Series 13)',
                'slug' => 'gbbo_2022',
            ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$bdyLgtuacfetxZ69rzfO1.7C2NoUAWb64wHedM6JYfnSkNzQM6OOO'
        ]);
    }
}
