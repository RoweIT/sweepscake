<?php

use App\Constants\Roles;
use App\Models\Baker;
use App\Models\Event;
use App\Models\Series;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
        $janusz = Baker::findBySlug('janusz-13');
        $carole = Baker::findBySlug('carole-13');

        $s13_wk3 = Week::create(['series_id' => $series13->id,
            'week_num' => 3,
            'theme' => 'Bread', 'signature' => '2 pizzas', 'technical' => 'Pain aux raisins', 'showstopper' => 'Smörgåstårta']);

        Event::create(['week_id' => $s13_wk3->id, 'baker_id' => $janusz->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s13_wk3->id, 'baker_id' => $janusz->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s13_wk3->id, 'baker_id' => $maxy->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s13_wk3->id, 'baker_id' => $james->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s13_wk3->id, 'baker_id' => $carole->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
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
