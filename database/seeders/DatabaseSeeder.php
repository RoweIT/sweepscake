<?php

namespace Database\Seeders;

use App\Constants\Roles;
use App\Models\Baker;
use App\Models\Event;
use App\Models\Series;
use App\Models\Sweepscake;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('sweepscake:create', [
            'name' => 'Sweepscake 2021',
            '--slug' => 'sweepscake-12',
            '--user-baker-mappings' => env('SEEDER_USERS_2021', ''),
        ]);

        Artisan::call('sweepscake:create', [
            'name' => 'Sweepscake 2022 #1',
            '--slug' => 'sweepscake-13-1',
            '--user-baker-mappings' => env('SEEDER_USERS_2022_1', ''),
        ]);

        Artisan::call('sweepscake:create', [
            'name' => 'Sweepscake 2022 #2',
            '--slug' => 'sweepscake-13-2',
            '--user-baker-mappings' => env('SEEDER_USERS_2022_2', ''),
        ]);
    }
}
