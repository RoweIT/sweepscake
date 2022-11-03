<?php

use App\Models\Baker;
use App\Models\Event;
use App\Models\Series;
use App\Models\Week;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $series13 = Series::findBySlug('gbbo-series-13');
        $sandro = Baker::findBySlug('sandro-13');
        $maxy = Baker::findBySlug('maxy-13');
        $syabira = Baker::findBySlug('syabira-13');
        $kevin = Baker::findBySlug('kevin-13');

        $s13_wk7 = Week::create(['series_id' => $series13->id,
            'week_num' => 7,
            'theme' => 'Custard', 'signature' => 'Floating Islands', 'technical' => 'Pistachio and Praline Ice Cream', 'showstopper' => 'Custard Gateau']);

        Event::create(['week_id' => $s13_wk7->id, 'baker_id' => $syabira->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s13_wk7->id, 'baker_id' => $sandro->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s13_wk7->id, 'baker_id' => $maxy->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s13_wk7->id, 'baker_id' => $kevin->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s13_wk7->id, 'baker_id' => $syabira->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s13_wk7->id, 'baker_id' => $kevin->id, 'type' => EVENT::TYPE_ELIMINATED]);
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
