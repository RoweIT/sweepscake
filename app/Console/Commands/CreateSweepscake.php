<?php

namespace App\Console\Commands;

use App\Models\Baker;
use App\Models\Series;
use App\Models\Sweepscake;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class CreateSweepscake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sweepscake:create
                            {name : The Sweepscake name}
                            {series : The series to create the Sweepscake for}
                            {--slug= : The Sweepscake slug}
                            {--user-baker-mapping* : The user baker mappings specified as user email name:baker slug}
                            {--user-baker-mappings= : The user baker mappings specified as user email name:baker slug as a comma separated list}
                            {--user-password= : The password to use for any users created}
                            {--email-domain=example.com : The email domain to use to apply to the user email name in the mappings}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a Sweepscake';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $seriesSlug = $this->argument('series');
        $series = Series::findBySlug($seriesSlug);

        $sweepscakeName = $this->argument('name');
        $userBakerMappings = [];
        if ($this->hasOption('user-baker-mapping')) {
            $userBakerMappings = $this->option('user-baker-mapping');
        }
        if ($this->hasOption('user-baker-mappings')) {
            $userBakerMappings = array_merge($userBakerMappings, explode(",", $this->option('user-baker-mappings')));
        }
        $password = '';
        if ($this->hasOption('user-password')) {
            $password = $this->option('user-password');
        } else {
            $password = Str::uuid();
        }

        $sweepscakeSlug = null;
        if ($this->hasOption('slug')) {
            $sweepscakeSlug = $this->option('slug');
        }
        if (!$sweepscakeSlug) {
            $sweepscakeSlug = Str::slug($sweepscakeName);
        }
        $emailDomain = $this->option('email-domain');

        $sweepscake = Sweepscake::findBySlug($sweepscakeSlug);
        if (!$sweepscake) {
            $sweepscake = Sweepscake::create(['slug' => $sweepscakeSlug, 'name' => $sweepscakeName, 'series_id' => $series->id]);
            $this->info("Created Sweepscake $sweepscake->name / $sweepscake->slug for Series $series->name");
        } else {
            $this->info("Updating existing sweepscake: $sweepscake");
        }



        $users = self::createUsersFromUserBakerMappings($sweepscake, $userBakerMappings, $emailDomain, $password);

        $this->info("Allocated bakers for $sweepscake->name");
        $this->table(
            ['Name'],
            $sweepscake->bakers->pluck('name')->map(function ($value) {
                return [$value];
            })
        );

        $this->table(
            ['User', 'Baker'],
            $sweepscake->sweepscakeUserBaker->map(function ($sub) {
                return [$sub->user->name, $sub->baker?->name];
            })
        );

        return 0;
    }

    private function createUsersFromUserBakerMappings(Sweepscake $sweepscake, string|array $mappings, string $emailDomain, $password): array
    {
        $now = Carbon::now();

        $users = [];
        foreach ($mappings as $mapping) {
            $pair = explode(':', $mapping);
            $userInfo = trim($pair[0]);
            $name = $this->generateName($userInfo);
            $username = $this->generateUsername($userInfo);
            $email = $userInfo . '@' . $emailDomain;

            $user = User::findByEmail($email);
            if (!$user) {
                $user = User::create(['name' => $name, 'username' => $username, 'email' => $email, 'password' => bcrypt($password)]);
                // email_verified_at not fillable so set explicitly
                $user->email_verified_at = $now;
                $user->save();
                $this->info("Created user name: $name, email: $email, password: $password");
            } else {
                $user->username = $username;
                $user->email_verified_at = $now;
                $user->save();
                $this->info("Updating existing user record for user: $username");
            }

            $users[] = $user;

            $baker = null;
            if (count($pair) >= 2) {
                $bakerSlug = trim($pair[1]);
                $baker = Baker::findBySlug($bakerSlug);
                if (!$baker) {
                    $this->error("Unable to find baker $bakerSlug to add to user $username");
                }
            }

            /*
             * These three ways of creating the relationship between the tables all work - I guess use the one that
             * makes the most sense.
             */
            try {
                // SweepscakeUserBaker::create(['sweepscake_id' => $sweepscake21->id, 'user_id' => $user->id, 'baker_id' => $baker->id]);
                // $baker->sweepscakes()->attach($sweepscake21->id, ['user_id' => $user->id]);
                $user->sweepscakes()->attach($sweepscake->id, ['baker_id' => $baker->id ?? null]);
            } catch (QueryException $e) {
                $this->warn("Unable to add mapping for sweepscake: $sweepscake->id, user: $user->id, baker $baker->id; ignoring");
            }

        }

        return $users;
    }

    public function generateName(string $userInfo)
    {
        $name = ucwords(str_replace('.', ' ', trim($userInfo)));
        return $name;
    }

    public function generateUsername(string $userInfo)
    {
        $name = strtolower(str_replace('.', ' ', trim($userInfo)));

         $separate = explode(" ", $name);

         if (count($separate) == 1) {
             return $name;
         }

         $last = array_pop($separate);
         return implode(' ', $separate).$last[0];
    }
}
