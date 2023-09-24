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
        $userBakerMappings = env('SEEDER_USERS_2022_2');
        if ($userBakerMappings) {
            Artisan::call('sweepscake:create', [
                'name' => 'Sweepscake 2022 #2',
                'series' => 'gbbo-series-13',
                '--slug' => 'sweepscake-13-2',
                '--email-domain' => env('SEEDER_USERS_EMAIL_DOMAIN', 'example.org'),
                '--user-password' => env('SEEDER_USER_PASSWORD'),
                '--user-baker-mappings' => $userBakerMappings,
            ]);
        }

        $sweepscake13_2 = Sweepscake::findBySlug('sweepscake-13-2');
        $series = $sweepscake13_2->series()->first();

        # week 5
        $week5 = $series->weeks()->where(['week_num' => 5])->first();

        $dawn = Baker::findBySlug('dawn-13');
        $sam = User::findByUsername('sam');
        Event::create(['week_id' => $week5->id, 'baker_id' => $dawn->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $sam->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $abdul = Baker::findBySlug('abdul-13');
        $hannah = User::findByUsername('hannahr');
        Event::create(['week_id' => $week5->id, 'baker_id' => $abdul->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $hannah->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $sandro = Baker::findBySlug('sandro-13');
        $beckyw = User::findByUsername('beckyw');
        Event::create(['week_id' => $week5->id, 'baker_id' => $sandro->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $beckyw->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $carole = Baker::findBySlug('carole-13');
        $joes = User::findByUsername('joes');
        Event::create(['week_id' => $week5->id, 'baker_id' => $carole->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $joes->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $kevin = Baker::findBySlug('kevin-13');
        $joek = User::findByUsername('joek');
        Event::create(['week_id' => $week5->id, 'baker_id' => $kevin->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $joek->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        # week 6
        $week6 = $series->weeks()->where(['week_num' => 6])->first();

        $janusz = Baker::findBySlug('janusz-13');
        $justint = User::findByUsername('justint');
        Event::create(['week_id' => $week6->id, 'baker_id' => $janusz->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $justint->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        # week 7
        $week7 = $series->weeks()->where(['week_num' => 7])->first();
    
        $syabira = Baker::findBySlug('syabira-13');
        $steve = User::findByUsername('stever');
        Event::create(['week_id' => $week7->id, 'baker_id' => $syabira->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $steve->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

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
