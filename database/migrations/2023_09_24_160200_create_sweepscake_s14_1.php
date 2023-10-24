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
        $userBakerMappings = env('SEEDER_USERS_2023_1');
        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2023 #1',
                'series' => 'gbbo-series-14',
                '--slug' => 'sweepscake-14-1',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);

            $sweepscake14_1 = Sweepscake::findBySlug('sweepscake-14-1');
            $series = $sweepscake14_1->series()->first();

            # week 2
            $week2 = $series->weeks()->where(['week_num' => 2])->first();
            $saku = Baker::findBySlug('saku-14');
            $hannahr = User::findByUsername('hannahr');
            Event::create(['week_id' => $week2->id, 'baker_id' => $saku->id, 'sweepscake_id' => $sweepscake14_1->id, 'user_id' => $hannahr->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            # week 4
            $week4 = $series->weeks()->where(['week_num' => 4])->first();

            $matty = Baker::findBySlug('matty-14');
            $garyr = User::findByUsername('garyr');
            Event::create(['week_id' => $week4->id, 'baker_id' => $matty->id, 'sweepscake_id' => $sweepscake14_1->id, 'user_id' => $garyr->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            $rowan = Baker::findBySlug('rowan-14');
            $heleni = User::findByUsername('heleni');
            Event::create(['week_id' => $week4->id, 'baker_id' => $rowan->id, 'sweepscake_id' => $sweepscake14_1->id, 'user_id' => $heleni->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
