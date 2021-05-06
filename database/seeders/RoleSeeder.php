<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'Admin']);
        $rol2 = Role::create(['name' => 'PromSoc']);

        Permission::create(['name' => 'admin.index'])->assignRole($rol1);

        Permission::create(['name' => 'colonias.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'colonias.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'colonias.show'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'colonias.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'colonias.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'colonias.destroy'])->syncRoles([$rol1, $rol2]);
    }
}
