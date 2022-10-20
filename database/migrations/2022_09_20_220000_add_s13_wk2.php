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
        $maxy = Baker::findBySlug('maxy-13');
        $maisam = Baker::findBySlug('maisam-13');
        $rebs = Baker::findBySlug('rebs-13');
        $james = Baker::findBySlug('james-13');
        $sandro = Baker::findBySlug('sandro-13');
        $abdul = Baker::findBySlug('abdul-13');
        $dawn = Baker::findBySlug('dawn-13');

        $s13_wk2 = Week::create(['series_id' => $series13->id,
            'week_num' => 2,
            'theme' => 'Biscuits', 'signature' => '18 Decorative Macarons', 'technical' => 'Garibaldi Biscuits', 'showstopper' => '3D Biscuit Mask']);

        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $maxy->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $rebs->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $james->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $sandro->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $abdul->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $maisam->id, 'type' => EVENT::TYPE_ELIMINATED]);

        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $maxy->id, 'type' => EVENT::TYPE_HANDSHAKE]);
        Event::create(['week_id' => $s13_wk2->id, 'baker_id' => $dawn->id, 'type' => EVENT::TYPE_HANDSHAKE]);
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
