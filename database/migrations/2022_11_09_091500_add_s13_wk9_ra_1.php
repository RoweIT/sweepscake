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
        $sweepscake13_2 = Sweepscake::findBySlug('sweepscake-13-2');
        $series = $sweepscake13_2->series()->first();
        $week9 = $series->weeks()->where(['week_num' => 9])->first();

        $sandro = Baker::findBySlug('janusz-13');
        $peters = User::findByUsername('peters');
        Event::create(['week_id' => $week9->id, 'baker_id' => $sandro->id, 'sweepscake_id' => $sweepscake13_2->id, 'user_id' => $peters->id, 'type' => EVENT::TYPE_RAISING_AGENT]);
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
