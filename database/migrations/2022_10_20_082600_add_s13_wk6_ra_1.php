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
        $week6 = $series->weeks()->where(['week_num' => 6])->first();

        $maxy = Baker::findBySlug('maxy-13');
        $pauli = User::findByUsername('pauli');
        Event::create(['week_id' => $week6->id, 'baker_id' => $maxy->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $pauli->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $janusz = Baker::findBySlug('janusz-13');
        $justint = User::findByUsername('justint');
        Event::create(['week_id' => $week6->id, 'baker_id' => $janusz->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $justint->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
