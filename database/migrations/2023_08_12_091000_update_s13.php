<?php

use App\Models\Series;
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
        $series13->status = Series::STATUS_COMPLETE;
        $series13->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $series13 = Series::findBySlug('gbbo-series-13');
        $series13->status = Series::STATUS_ACTIVE;
    }
};
