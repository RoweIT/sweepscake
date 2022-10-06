<?php

use App\Constants\Roles;
use App\Models\Baker;
use App\Models\Event;
use App\Models\Series;
use App\Models\Sweepscake;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('events', function (Blueprint $table) {
            // some events relate to a sweepscake and a user
            $table->foreignIdFor(Baker::class)->nullable(true)->change();
            $table->foreignIdFor(Sweepscake::class)->nullable(true);
            $table->foreignIdFor(User::class)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('sweepscake_id');
        });
    }
};