<?php

namespace Database\Seeders;

use App\Models\Baker;
use App\Models\Participant;
use App\Models\Series;
use App\Models\Sweepscake;
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
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$bdyLgtuacfetxZ69rzfO1.7C2NoUAWb64wHedM6JYfnSkNzQM6OOO'
        ]);

        $particpants2021 = User::factory(12)->create();

        $gbbo2021 = Series::factory()
            ->has(Baker::factory()->count(12))
            ->has(Sweepscake::factory()->count(1))
            ->create([
                'start_on' => Date::create(2021, 9, 21),
                'name' => 'GBBO 2021 (Series 12)',
                'slug' => 'gbbo_2021',
            ]);

        $particpants2022 = User::factory(12)->create();

        $gbbo2022 = Series::factory()
            ->has(Baker::factory()->count(12))
            ->has(Sweepscake::factory()->count(2))
            ->create([
                'start_on' => Date::create(2022, 9, 13),
                'name' => 'GBBO 2022 (Series 13)',
                'slug' => 'gbbo_2022',
            ]);

        $bakers = Baker::findAllForSweepscake(1);
        foreach ($bakers as $baker) {
            $this->command->info($baker->name);
        }
        $this->command->info("---------------");
        $bakers = Sweepscake::find(1)->findAllBakersForSeries();
        foreach ($bakers as $baker) {
            $this->command->info($baker->name);
        }

//        $sweepscake2022a = Sweepscake::factory()->create();

//        SweepscakeUser::factory()
//            ->state(new Sequence(
//                fn($sequence) => ['user_id' => User::all()->random()],
//            ))->create([
//                'sweepscake_id' => $sweepscake2022a->id,
//            ]);
    }
}
