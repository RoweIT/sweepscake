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
        $userBakerMappings = env('SEEDER_USERS_2023_2');
        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2023 #2',
                'series' => 'gbbo-series-14',
                '--slug' => 'sweepscake-14-2',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);
        }

        $sweepscake14_2 = Sweepscake::findBySlug('sweepscake-14-2');
        $series = $sweepscake14_2->series()->first();

        # week 2
        $week2 = $series->weeks()->where(['week_num' => 2])->first();
        $dana = Baker::findBySlug('dana-14');
        $pauli = User::findByUsername('pauli');
        Event::create(['week_id' => $week2->id, 'baker_id' => $dana->id, 'sweepscake_id' => $sweepscake14_2->id, 'user_id' => $pauli->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        # week 4
        $week4 = $series->weeks()->where(['week_num' => 4])->first();
        $rowan = Baker::findBySlug('rowan-14');
        $peters = User::findByUsername('peters');
        Event::create(['week_id' => $week4->id, 'baker_id' => $rowan->id, 'sweepscake_id' => $sweepscake14_2->id, 'user_id' => $peters->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
