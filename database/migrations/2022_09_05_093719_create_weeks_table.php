<?php

use App\Models\Baker;
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
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('week_num');
            $table->string('theme');
            $table->string('signature');
            $table->string('technical');
            $table->string('showstopper');
            $table->foreignIdFor(Series::class);
            $table->foreignIdFor(Baker::class, 'star_baker')->nullable(true);
            $table->foreignIdFor(Baker::class, 'eliminated')->nullable(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weeks');
    }
};
