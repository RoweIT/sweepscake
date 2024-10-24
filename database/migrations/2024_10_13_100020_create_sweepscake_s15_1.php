<?php

use App\Models\Baker;
use App\Models\Event;
use App\Models\Sweepscake;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # $userBakerMappings = env('SEEDER_USERS_2023_1');
        # hardcoded for convenience
        $userBakerMappings = "melanies:nelly-15,justint:georgie-15,saml:jeff-15,livoc:christiaan-15,joes:hazel-15,bens:andy-15,paulr:dylan-15,lucyb:illiyin-15,fayd:sumayah-15,pauli:mike-15,terril:gill-15,alexs:john-15";

        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2024 #1',
                'series' => 'gbbo-series-15',
                '--slug' => 'sweepscake-15-1',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);
            
            $sweepscake15_1 = Sweepscake::findBySlug('sweepscake-15-1');
            $series = $sweepscake15_1->series()->first();
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
