<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # $userBakerMappings = env('SEEDER_USERS_2021');
        # hardcoded for convenience
        $userBakerMappings = "damian:amanda-12,stuartd:chigs-12,adamn:crystelle-12,justint:freya-12,paulr:george-12,pauli:giuseppe-12,zacheryh:jairzeno-12,hannahr:jurgen-12,bradleyp:lizzie-12,sam:maggie-12,deannad:rochica-12,stever:tom-12";

        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2021',
                'series' => 'gbbo-series-12',
                '--slug' => 'sweepscake-12',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
