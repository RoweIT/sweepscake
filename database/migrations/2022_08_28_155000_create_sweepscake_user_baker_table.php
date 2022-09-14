<?php

use App\Models\Baker;
use App\Models\Sweepscake;
use App\Models\User;
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
        $table = Schema::create('sweepscake_user_bakers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sweepscake::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Baker::class)->nullable(true);
            $table->timestamps();

            // each row has to be unique
            $table->unique(['sweepscake_id', 'user_id', 'baker_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sweepscake_user_bakers');
    }
};
