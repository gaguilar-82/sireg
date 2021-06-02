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
        //Roles de Usuario
        $rol1 = Role::create(['name' => 'Admin']);
        $rol2 = Role::create(['name' => 'Dirección de la Tenencia de la Tierra']);
        $rol3 = Role::create(['name' => 'Delegación Regional']);
        $rol4 = Role::create(['name' => 'Promoción Social']);
        $rol5 = Role::create(['name' => 'Área Técnica']);
        $rol6 = Role::create(['name' => 'Administración y Finanzas']);
        $rol7 = Role::create(['name' => 'Escrituración']);

        //Permisos para la gestión de usuarios

        Permission::create(['name' => 'admin.index'])->assignRole($rol1);

        Permission::create(['name' => 'admin.users.index'])->assignRole($rol1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($rol1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($rol1);
        Permission::create(['name' => 'admin.users.update'])->assignRole($rol1);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($rol1);

        Permission::create(['name' => 'admin.directors.index'])->assignRole($rol1);
        Permission::create(['name' => 'admin.directors.create'])->assignRole($rol1);
        Permission::create(['name' => 'admin.directors.edit'])->assignRole($rol1);
        Permission::create(['name' => 'admin.directors.update'])->assignRole($rol1);
        Permission::create(['name' => 'admin.directors.destroy'])->assignRole($rol1);

        //Permisos home
        Permission::create(['name' => 'home'])->syncRoles([$rol1, $rol2, $rol3, $rol4, $rol5, $rol6, $rol7]);

        //Permisos para el módulo de Colonias
        Permission::create(['name' => 'colonias.index'])->syncRoles([$rol2, $rol3, $rol4, $rol5, $rol7]);
        Permission::create(['name' => 'colonias.store'])->syncRoles([$rol2]);
        Permission::create(['name' => 'colonias.show'])->syncRoles([$rol2, $rol3, $rol4, $rol5, $rol7]);
        Permission::create(['name' => 'colonias.edit'])->syncRoles([$rol2]);
        Permission::create(['name' => 'colonias.update'])->syncRoles([$rol2]);
        Permission::create(['name' => 'colonias.destroy'])->syncRoles([$rol2]);

        //Permisos para el módulo de Lotes
        Permission::create(['name' => 'lotes.index'])->syncRoles([$rol3, $rol4, $rol5, $rol7]);
        Permission::create(['name' => 'lotes.store'])->syncRoles([$rol5]);
        Permission::create(['name' => 'lotes.show'])->syncRoles([$rol3, $rol4, $rol5, $rol7]);
        Permission::create(['name' => 'lotes.edit'])->syncRoles([$rol5]);
        Permission::create(['name' => 'lotes.update'])->syncRoles([$rol5]);
        Permission::create(['name' => 'lotes.destroy'])->syncRoles([$rol5]);
        Permission::create(['name' => 'lotes.print'])->syncRoles([$rol5]);

        //Permisos para el módulo de Posesionarios
        Permission::create(['name' => 'posesionarios.index'])->syncRoles([$rol3, $rol4, $rol7]);
        Permission::create(['name' => 'posesionarios.store'])->syncRoles([$rol4]);
        Permission::create(['name' => 'posesionarios.show'])->syncRoles([$rol3, $rol4, $rol7]);
        Permission::create(['name' => 'posesionarios.edit'])->syncRoles([$rol4]);
        Permission::create(['name' => 'posesionarios.update'])->syncRoles([$rol4]);
        Permission::create(['name' => 'posesionarios.destroy'])->syncRoles([$rol4]);

        //Permisos para el módulo de Asignación
        Permission::create(['name' => 'asignados.index'])->syncRoles([$rol3, $rol4, $rol6, $rol7]);
        Permission::create(['name' => 'asignados.store'])->syncRoles([$rol4]);
        Permission::create(['name' => 'asignados.show'])->syncRoles([$rol3, $rol4, $rol6, $rol7]);
        Permission::create(['name' => 'asignados.edit'])->syncRoles([$rol4]);
        Permission::create(['name' => 'asignados.update'])->syncRoles([$rol4]);
        Permission::create(['name' => 'asignados.validar'])->syncRoles([$rol4]);
        Permission::create(['name' => 'asignados.destroy'])->syncRoles([$rol4]);

        //Permisos para el módulo de Pagos
        Permission::create(['name' => 'pagos.index'])->syncRoles([$rol3, $rol4, $rol6, $rol7]);
        Permission::create(['name' => 'pagos.store'])->syncRoles([$rol6]);
        Permission::create(['name' => 'pagos.show'])->syncRoles([$rol3, $rol4, $rol6, $rol7]);
        Permission::create(['name' => 'pagos.edit'])->syncRoles([$rol6]);
        Permission::create(['name' => 'pagos.update'])->syncRoles([$rol6]);
        Permission::create(['name' => 'pagos.destroy'])->syncRoles([$rol6]);
        Permission::create(['name' => 'pagos.print'])->syncRoles([$rol3, $rol4, $rol6]);

        //Permisos para el módulo de Inspecciones
        Permission::create(['name' => 'inspecciones.index'])->syncRoles([$rol3, $rol4, $rol5, $rol7]);
        Permission::create(['name' => 'inspecciones.store'])->syncRoles([$rol4]);
        Permission::create(['name' => 'inspecciones.show'])->syncRoles([$rol3, $rol4, $rol5, $rol7]);
        Permission::create(['name' => 'inspecciones.edit'])->syncRoles([$rol4]);
        Permission::create(['name' => 'inspecciones.update'])->syncRoles([$rol4]);
        Permission::create(['name' => 'inspecciones.destroy'])->syncRoles([$rol4]);
        Permission::create(['name' => 'inspecciones.print'])->syncRoles([$rol3, $rol4]);

        //Permisos para el módulo de Escrituración
        Permission::create(['name' => 'escrituras.index'])->syncRoles([$rol2, $rol3, $rol4, $rol7]);
        Permission::create(['name' => 'escrituras.store'])->syncRoles([$rol7]);
        Permission::create(['name' => 'escrituras.show'])->syncRoles([$rol2, $rol3, $rol4, $rol7]);
        Permission::create(['name' => 'escrituras.edit'])->syncRoles([$rol7]);
        Permission::create(['name' => 'escrituras.update'])->syncRoles([$rol7]);
        Permission::create(['name' => 'escrituras.destroy'])->syncRoles([$rol7]);
        Permission::create(['name' => 'escrituras.print'])->syncRoles([$rol2, $rol3, $rol4, $rol7]);
        Permission::create(['name' => 'escrituras.pdf'])->syncRoles([$rol2, $rol7]);
    }
}
