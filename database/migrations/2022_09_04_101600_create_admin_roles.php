<?php

use App\Constants\Permissions;
use App\Constants\Roles;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role = Role::create(['name' => Roles::ADMINISTRATOR]);
        $permission = Permission::create(['name' => Permissions::VIEW_ALL_SWEEPSCAKES]);
        $permission->assignRole($role);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $role = Role::findByName(Roles::ADMINISTRATOR);
        // Need to detach related entities before deleting.
        $role->permissions()->detach();
        $role->users()->detach();
        $role->delete();

        $this->removePermission(Permission::findByName(Permissions::VIEW_ALL_SWEEPSCAKES));
    }

    /**
     * Deletes the permission by first detaching the permission from all attached users and roles
     * then deleting the permission itself.
     * @param Permission $permission
     */
    private function removePermission(Permission $permission): void
    {
        $permission->roles()->detach();
        $permission->users()->detach();
        $permission->delete();
    }

};
