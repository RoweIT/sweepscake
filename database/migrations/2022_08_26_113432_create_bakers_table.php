<?php

use App\Models\Series;
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
        Schema::create('bakers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->nullable(false);
            $table->string('name')->nullable(false);
            $table->integer('age');
            $table->string('from');
            $table->string('job');
            $table->text('bio');
            $table->string('image_path');
            $table->foreignIdFor(Series::class);
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
        Schema::dropIfExists('bakers');
    }
};
