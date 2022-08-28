<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_sweepscake', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Sweepscake::class);
            $table->foreignIdFor(\App\Models\Participant::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant_sweepscake');
    }
};
