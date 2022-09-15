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
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $emailDomain = env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org');

        $series12 = Series::findBySlug('gbbo-series-12');

        $this->command->info("");
        $this->command->info("Creating users for $series12->name");
        $this->command->info("------------------");
        $sweepscake12 = Sweepscake::create(['slug' => 'sweepscake-12', 'name' => 'Sweepscake 2021', 'series_id' => $series12->id]);
        $userBakerMappings21 = env('SEEDER_USERS_2021', 'tom,dick,harry');
        $users21 = self::createUsersFromUserBakerMappings($sweepscake12, $userBakerMappings21, $emailDomain);

        $series13 = Series::findBySlug('gbbo-series-13');

        $this->command->info("");
        $this->command->info("Creating users for $series13->name (#1)");
        $this->command->info("------------------");
        $sweepscake13_1 = Sweepscake::create(['slug' => 'sweepscake-13-1', 'name' => 'Sweepscake 2022 #1', 'series_id' => $series13->id]);
        $userBakerMappings22_1 = env('SEEDER_USERS_2022_1', '');
        $users22 = self::createUsersFromUserBakerMappings($sweepscake13_1, $userBakerMappings22_1, $emailDomain);

        $this->command->info("");
        $this->command->info("Creating users for $series13->name (#2)");
        $this->command->info("------------------");
        $sweepscake13_2 = Sweepscake::create(['slug' => 'sweepscake-13-2', 'name' => 'Sweepscake 2022 #2', 'series_id' => $series13->id]);
        $userBakerMappings22_2 = env('SEEDER_USERS_2022_2', '');
        $users22 = self::createUsersFromUserBakerMappings($sweepscake13_2, $userBakerMappings22_2, $emailDomain);

        $this->command->info("");
        $this->command->info("All bakers for $series12->name");
        $this->command->info("----------------");
        foreach ($series12->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Allocated bakers for $sweepscake12->name");
        $this->command->info("----------------");
        foreach ($sweepscake12->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Sweepscake 2021 User/Baker");
        $this->command->info("---------------");
        foreach ($sweepscake12->sweepscakeUserBaker as $sub) {
            $this->command->info($sub->user->name . ' => ' . $sub->baker->name);
        }

        $this->command->info("");
        $this->command->info("All bakers for $series13->name");
        $this->command->info("----------------");
        foreach ($series13->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Allocated bakers for $sweepscake13_1->name");
        $this->command->info("----------------");
        foreach ($sweepscake13_1->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Sweepscake 2022 #1 User/Baker");
        $this->command->info("---------------");
        foreach ($sweepscake13_1->sweepscakeUserBaker as $sub) {
            $this->command->info($sub->user->name . ' => ' . $sub->baker?->name);
        }

        $this->command->info("");
        $this->command->info("Allocated bakers for $sweepscake13_2->name");
        $this->command->info("----------------");
        foreach ($sweepscake13_2->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Sweepscake 2022 #2 User/Baker");
        $this->command->info("---------------");
        foreach ($sweepscake13_2->sweepscakeUserBaker as $sub) {
            $this->command->info($sub->user->name . ' => ' . $sub->baker?->name);
        }
    }

    private function createUsersFromUserBakerMappings(Sweepscake $sweepscake, string $userBakerMappings, string $emailDomain): array
    {
        $now = Carbon::now();

        $users = [];
        $mappings = explode(",", $userBakerMappings);
        foreach ($mappings as $mapping) {
            $pair = explode(':', $mapping);
            $userInfo = trim($pair[0]);
            $name = $this->generateName($userInfo);

            $username = Str::slug(str_replace('.', '-', $userInfo));
            $email = $userInfo . '@' . $emailDomain;
            $password = env('SEEDER_USER_PASSWORD', Str::uuid());

            $user = User::findByUsername($username);

            if (!$user) {
                $this->command->info("Creating user name: $name, email: $email, password: $password");
                $user = User::create(['name' => $name, 'username' => $username, 'email' => $email, 'password' => bcrypt($password), 'email_verified_at' => $now]);
            } else {
                $this->command->info("Using existing user record for user name: $name");
            }

            $users[] = $user;

            if (count($pair) >= 2) {
                $bakerSlug = trim($pair[1]);
                $baker = Baker::findBySlug($bakerSlug);
                if (!$baker) {
                    $this->command->error("Unable to find bakers $bakerSlug to add to user $username");
                }
            }

            /*
             * These three ways of creating the relationship between the tables all work - I guess use the one that
             * makes the most sense.
             */
            // SweepscakeUserBaker::create(['sweepscake_id' => $sweepscake21->id, 'user_id' => $user->id, 'baker_id' => $baker->id]);
            // $baker->sweepscakes()->attach($sweepscake21->id, ['user_id' => $user->id]);
            $user->sweepscakes()->attach($sweepscake->id, ['baker_id' => $baker->id ?? null]);

        }

        return $users;
    }

    public function generateName(string $username)
    {

        $name = ucwords(str_replace('.', ' ', trim($username)));

        return $name;

//        $separate = explode(" ", $name);
//
//        if (count($separate) == 1) {
//            return $name;
//        }
//
//        $last = array_pop($separate);
//        return implode(' ', $separate)." ".$last[0];
    }

}
