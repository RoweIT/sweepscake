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
        $week8 = $series->weeks()->where(['week_num' => 8])->first();

        $sandro = Baker::findBySlug('sandro-13');
        $rossc = User::findByUsername('rossc');
        Event::create(['week_id' => $week8->id, 'baker_id' => $sandro->id, 'sweepscake_id' => $sweepscake13_1->id, 'user_id' => $rossc->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
