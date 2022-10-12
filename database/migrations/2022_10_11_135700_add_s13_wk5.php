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
        $sandro = Baker::findBySlug('sandro-13');
        $janusz = Baker::findBySlug('janusz-13');
        $maxy = Baker::findBySlug('maxy-13');
        $abdul = Baker::findBySlug('abdul-13');
        $syabira = Baker::findBySlug('syabira-13');
        $carole = Baker::findBySlug('carole-13');

        $s13_wk4 = Week::create(['series_id' => $series13->id,
            'week_num' => 5,
            'theme' => 'Desserts', 'signature' => '8 Steamed Puddings', 'technical' => 'Lemon Meringue Pie with no recipe', 'showstopper' => 'Hidden Surprive Mousse Dessert']);

        Event::create(['week_id' => $s13_wk4->id, 'baker_id' => $sandro->id, 'type' => EVENT::TYPE_STAR_BAKER]);
        Event::create(['week_id' => $s13_wk4->id, 'baker_id' => $janusz->id, 'type' => EVENT::TYPE_TECHNICAL_FIRST]);
        Event::create(['week_id' => $s13_wk4->id, 'baker_id' => $abdul->id, 'type' => EVENT::TYPE_TECHNICAL_SECOND]);
        Event::create(['week_id' => $s13_wk4->id, 'baker_id' => $maxy->id, 'type' => EVENT::TYPE_TECHNICAL_THIRD]);
        Event::create(['week_id' => $s13_wk4->id, 'baker_id' => $syabira->id, 'type' => EVENT::TYPE_TECHNICAL_LAST]);
        Event::create(['week_id' => $s13_wk4->id, 'baker_id' => $carole->id, 'type' => EVENT::TYPE_ELIMINATED]);
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
