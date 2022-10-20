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
        $series13->update(['name' => 'Great British Bake Off 2022 (series 13)']);

        $s13_wk1 = Week::where(['series_id' => $series13->id])->first();
        Event::where(['week_id' => $s13_wk1->id])->delete();

        $janusz = Baker::findBySlug('janusz-13');
        $sandro = Baker::findBySlug('sandro-13');
        $syabira = Baker::findBySlug('syabira-13');
        $dawn = Baker::findBySlug('dawn-13');
        $james = Baker::findBySlug('james-13');
        $will = Baker::findBySlug('will-13');

        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $janusz->id, 'type' => Event::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $syabira->id, 'type' => Event::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $sandro->id, 'type' => Event::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $dawn->id, 'type' => Event::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $james->id, 'type' => Event::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $will->id, 'type' => Event::TYPE_ELIMINATED]);
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
