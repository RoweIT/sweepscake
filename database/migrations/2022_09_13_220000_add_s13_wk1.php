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
        $janusz = Baker::findBySlug('janusz-13');
        $sandro = Baker::findBySlug('sandro-13');
        $syabira = Baker::findBySlug('syabira-13');
        $dawn = Baker::findBySlug('dawn-13');
        $james = Baker::findBySlug('james-13');
        $will = Baker::findBySlug('will-13');

        $s13_wk1 = Week::create(['series_id' => $series13->id,
            'week_num' => 1,
            'theme' => 'Cake', 'signature' => '12 Mini Sandwich Cakes', 'technical' => 'Red Velvet Cake', 'showstopper' => 'Cake Home']);

        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $janusz->id, 'type' => 'star-baker']);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $sandro->id, 'type' => 'technical-first']);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $syabira->id, 'type' => 'technical-second']);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $dawn->id, 'type' => 'technical-third']);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $james->id, 'type' => 'technical-last']);
        Event::create(['week_id' => $s13_wk1->id, 'baker_id' => $will->id, 'type' => 'eliminated']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // TODO
    }
};
