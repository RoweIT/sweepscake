<?php

use App\Models\Baker;
use App\Models\Event;
use App\Models\Sweepscake;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sweepscake13_1 = Sweepscake::findBySlug('sweepscake-13-1');
        $sweepscake13_2 = Sweepscake::findBySlug('sweepscake-13-2');
        $series = $sweepscake13_1->series()->first();
        $week5 = $series->weeks()->where(['week_num' => 5])->first();

        $dawn = Baker::findBySlug('dawn-13');
        $sam = User::findByUsername('sam');
        Event::create(['week_id' => $week5->id, 'baker_id' => $dawn->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $sam->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $abdul = Baker::findBySlug('abdul-13');
        $hannah = User::findByUsername('hannah');
        Event::create(['week_id' => $week5->id, 'baker_id' => $abdul->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $hannah->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $sandro = Baker::findBySlug('sandro-13');
        $beckyw = User::findByUsername('beckyw');
        Event::create(['week_id' => $week5->id, 'baker_id' => $sandro->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $beckyw->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $carole = Baker::findBySlug('carole-13');
        $joes = User::findByUsername('joes');
        Event::create(['week_id' => $week5->id, 'baker_id' => $carole->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $joes->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $kevin = Baker::findBySlug('kevin-13');
//        $grainnef = User::findByUsername('grainnef');
//        Event::create(['week_id' => $week5->id, 'baker_id' => $kevin->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $grainnef->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
        $joek = User::findByUsername('joek');
        Event::create(['week_id' => $week5->id, 'baker_id' => $kevin->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $joek->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
