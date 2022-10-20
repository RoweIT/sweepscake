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
        $series = $sweepscake13_1->series()->first();
        $week3 = $series->weeks()->where(['week_num' => 3])->first();

        $abdul = Baker::findBySlug('abdul-13');
        $jonw = User::findByUsername('jonw');
        Event::create(['week_id' => $week3->id, 'baker_id' => $abdul->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $jonw->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $mattg = User::findByUsername('matthewg');
        $carole = Baker::findBySlug('carole-13');
        Event::create(['week_id' => $week3->id, 'baker_id' => $carole->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $mattg->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
