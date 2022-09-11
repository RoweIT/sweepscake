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

        $series12 = Series::findBySlug('gbbo-series-12');
        $series13 = Series::findBySlug('gbbo-series-13');

        $emailDomain = env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org');

        $this->command->info("");
        $this->command->info("Creating users for $series12->name");
        $this->command->info("------------------");
        $sweepscake21 = Sweepscake::create(['slug' => 'sweepscake-21', 'name' => 'Sweepscake 2021', 'series_id' => $series12->id]);
        $userBakerMappings21 = env('SEEDER_USERS_2021', 'tom,dick,harry');
        $users21 = self::createUsersFromUserBakerMappings($sweepscake21, $userBakerMappings21, $emailDomain);

        $this->command->info("");
        $this->command->info("Creating users for $series12->name");
        $this->command->info("------------------");
        $sweepscake22 = Sweepscake::create(['slug' => 'sweepscake-22', 'name' => 'Sweepscake 2022', 'series_id' => $series13->id]);
        $userBakerMappings22 = env('SEEDER_USERS_2022', 'tom,dick,harry');
        $users22 = self::createUsersFromUserBakerMappings($sweepscake22, $userBakerMappings22, $emailDomain);

        $this->command->info("");
        $this->command->info("All bakers for $series12->name");
        $this->command->info("----------------");
        foreach ($series12->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Allocated bakers for $sweepscake21->name");
        $this->command->info("----------------");
        foreach ($sweepscake21->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Sweepscake 2021 User/Baker");
        $this->command->info("---------------");
        foreach ($sweepscake21->sweepscakeUserBaker as $sub) {
            $this->command->info($sub->user->name . ' => ' . $sub->baker->name);
        }

        $this->command->info("");
        $this->command->info("All bakers for $series13->name");
        $this->command->info("----------------");
        foreach ($series13->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Allocated bakers for $sweepscake22->name");
        $this->command->info("----------------");
        foreach ($sweepscake22->bakers as $baker) {
            $this->command->info($baker->name);
        }

        $this->command->info("");
        $this->command->info("Sweepscake 2022 User/Baker");
        $this->command->info("---------------");
        foreach ($sweepscake22->sweepscakeUserBaker as $sub) {
            $this->command->info($sub->user->name . ' => ' . $sub->baker->name);
        }
    }

    private function createUsersFromUserBakerMappings(Sweepscake $sweepscake, string $userBakerMappings, string $emailDomain): array
    {
        $now = Carbon::now();

        $users = [];
        $mappings = explode(",", $userBakerMappings);
        foreach ($mappings as $mapping) {
            $pair = explode(':', $mapping);
            $username = trim($pair[0]);
            $name = $this->generateName($username);

            $slug = Str::slug(str_replace('.', '-', $username));
            $email = $username . '@' . $emailDomain;
            $password = env('SEEDER_USER_PASSWORD', Str::uuid());

            $user = User::findByUsername($slug);

            if (!$user) {
                $this->command->info("Creating user name: $name, email: $email, password: $password");
                $user = User::create(['name' => $name, 'username' => $slug, 'email' => $email, 'password' => bcrypt($password), 'email_verified_at' => $now]);
            } else {
                $this->command->info("Using existing user record for user name: $name");
            }

            $users[] = $user;

            if (count($pair) < 2) {
                $this->command->error("No baker specified for user $name");
                continue;
            }

            $bakerSlug = trim($pair[1]);
            $baker = Baker::findBySlug($bakerSlug);
            if (!$baker) {
                $this->command->error("Unable to find bakers $bakerSlug to add to user $slug");
                continue;
            }

            /*
             * These three ways of creating the relationship between the tables all work - I guess use the one that
             * makes the most sense.
             */
            // SweepscakeUserBaker::create(['sweepscake_id' => $sweepscake21->id, 'user_id' => $user->id, 'baker_id' => $baker->id]);
            // $baker->sweepscakes()->attach($sweepscake21->id, ['user_id' => $user->id]);
            $user->sweepscakes()->attach($sweepscake->id, ['baker_id' => $baker->id]);

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
