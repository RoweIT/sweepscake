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
        # $userBakerMappings = env('SEEDER_USERS_2022_1');
        # hardcoded for convenience
        $userBakerMappings = "rossc:sandro-13,tristany:rebs-13,edwardw:syabira-13,stuartd:dawn-13,mattb:james-13,jonw:abdul-13,matthewg:carole-13,zacheryh:will-13,grainnef:kevin-13,peters:janusz-13,pauli:maxy-13,fayd:maisam-13";

        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2022 #1',
                'series' => 'gbbo-series-13',
                '--slug' => 'sweepscake-13-1',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);

            $sweepscake13_1 = Sweepscake::findBySlug('sweepscake-13-1');
            $series = $sweepscake13_1->series()->first();

            # week 3
            $week3 = $series->weeks()->where(['week_num' => 3])->first();
            $abdul = Baker::findBySlug('abdul-13');
            $jonw = User::findByUsername('jonw');
            Event::create(['week_id' => $week3->id, 'baker_id' => $abdul->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $jonw->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            $mattg = User::findByUsername('matthewg');
            $carole = Baker::findBySlug('carole-13');
            Event::create(['week_id' => $week3->id, 'baker_id' => $carole->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $mattg->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            # week 6
            $week6 = $series->weeks()->where(['week_num' => 6])->first();

            $maxy = Baker::findBySlug('maxy-13');
            $pauli = User::findByUsername('pauli');
            Event::create(['week_id' => $week6->id, 'baker_id' => $maxy->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $pauli->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            # week 7
            $week7 = $series->weeks()->where(['week_num' => 7])->first();

            $syabira = Baker::findBySlug('syabira-13');
            $edwardw = User::findByUsername('edwardw');
            Event::create(['week_id' => $week7->id, 'baker_id' => $syabira->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $edwardw->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            # week 8
            $week8 = $series->weeks()->where(['week_num' => 8])->first();

            $sandro = Baker::findBySlug('sandro-13');
            $rossc = User::findByUsername('rossc');
            Event::create(['week_id' => $week8->id, 'baker_id' => $sandro->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $rossc->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

            # week 9
            $week9 = $series->weeks()->where(['week_num' => 9])->first();

            $janusz = Baker::findBySlug('janusz-13');
            $peters = User::findByUsername('peters');
            Event::create(['week_id' => $week9->id, 'baker_id' => $janusz->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $peters->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
