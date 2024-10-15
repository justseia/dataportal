<?php

namespace Database\Seeders;

use App\Enums\AdminPermissions;
use App\Models\Admin\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::query()->delete();
        Role::query()->delete();

        $permissions = AdminPermissions::getAdminPermissionsKey();

        $admin = Admin::query()->where('email', 'admin@dataportal.kz')->first();

        $role = Role::query()->create([
            'name' => 'super_admin',
        ]);

        $admin->assignRole($role);

        foreach ($permissions as $permission) {
            Permission::query()->create([
                'name' => $permission,
            ]);
            $admin->givePermissionTo($permission);
        }
    }
}
