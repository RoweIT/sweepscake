<?php

use App\Constants\Roles;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
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
        $adminName = env('SEEDER_ADMIN_NAME');
        $adminEmail = env('SEEDER_ADMIN_EMAIL');
        if ($adminName && $adminEmail) {
            $adminUsername = Str::slug($adminName);
            $adminPassword = env('SEEDER_ADMIN_PASSWORD', Str::uuid());
            $admin = User::factory()->create([
                'name' => $adminName,
                'username' => $adminUsername,
                'email' => $adminEmail,
                'password' => bcrypt($adminPassword)
            ]);
            $role = Role::findByName(Roles::ADMINISTRATOR);
            $role->users()->attach($admin);
            // does not work from a Migration
            // $this->info("Created admin Admin user, name: $admin->name, email: $admin->email and password: $adminPassword");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $adminName = env('SEEDER_ADMIN_NAME');
        $adminEmail = env('SEEDER_ADMIN_EMAIL');
        if ($adminName && $adminEmail) {
            $adminUsername = Str::slug($adminName);
            $admin = User::findByUsername($adminUsername);
            if ($admin) {
                $admin->delete();
            }
        }
    }
};
