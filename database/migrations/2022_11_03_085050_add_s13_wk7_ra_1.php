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
        $week7 = $series->weeks()->where(['week_num' => 7])->first();

        $syabira = Baker::findBySlug('syabira-13');
        $edwardw = User::findByUsername('edwardw');
        Event::create(['week_id' => $week7->id, 'baker_id' => $syabira->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $edwardw->id, 'type' => EVENT::TYPE_RAISING_AGENT]);

        $steve = User::findByUsername('steve');
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
