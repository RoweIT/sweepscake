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
        $userBakerMappings = "billd:nelly-15,sarao:georgie-15,hannahr:jeff-15,katym:christiaan-15,aimeef:hazel-15,nathanf:andy-15,jessi:dylan-15,robo:illiyin-15,emilyl:sumayah-15,peters:mike-15,edwardw:gill-15,richardm:john-15";

        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2024 #2',
                'series' => 'gbbo-series-15',
                '--slug' => 'sweepscake-15-2',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);

            $sweepscake15_2 = Sweepscake::findBySlug('sweepscake-15-2');
            $series = $sweepscake15_2->series()->first();
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
