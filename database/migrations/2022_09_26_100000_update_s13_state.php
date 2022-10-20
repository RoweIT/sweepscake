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
        $series13 = Series::where(['slug' => 'gbbo-series-13'])->update(['status' => Series::STATUS_ACTIVE]);
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
