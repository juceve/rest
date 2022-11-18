<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create((['name' => 'SuperAdmin']));
        $role2 = Role::create((['name' => 'Admin']));

        Permission::create(['name' => 'home','grupo' => 'Inicio', 'descripcion' => 'Home'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'settings','grupo' => 'COMPONENTES', 'descripcion' => 'Componentes de Inicio'])->syncRoles([$role1]);

        Permission::create(['name' => 'users.index','grupo' => 'USUARIOS', 'descripcion' => 'Ver listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit','grupo' => 'USUARIOS', 'descripcion' => 'Asignar Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'cursos.index','grupo' => 'CURSOS', 'descripcion' => 'Ver listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'cursos.create','grupo' => 'CURSOS', 'descripcion' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'cursos.edit','grupo' => 'CURSOS', 'descripcion' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'cursos.destroy','grupo' => 'CURSOS', 'descripcion' => 'Eliminar'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'empresas.index','grupo' => 'EMPRESAS', 'descripcion' => 'Ver listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'empresas.create','grupo' => 'EMPRESAS', 'descripcion' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'empresas.edit','grupo' => 'EMPRESAS', 'descripcion' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'empresas.destroy','grupo' => 'EMPRESAS', 'descripcion' => 'Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales','grupo' => 'SUCURSALES', 'descripcion' => 'Ver listado'])->syncRoles([$role1]);        
        Permission::create(['name' => 'sucursales.create','grupo' => 'SUCURSALES', 'descripcion' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.edit','grupo' => 'SUCURSALES', 'descripcion' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.destroy','grupo' => 'SUCURSALES', 'descripcion' => 'Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.disable','grupo' => 'SUCURSALES', 'descripcion' => 'Desactivar'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index','grupo' => 'ROLES', 'descripcion' => 'Ver listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create','grupo' => 'ROLES', 'descripcion' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit','grupo' => 'ROLES', 'descripcion' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy','grupo' => 'ROLES', 'descripcion' => 'Eliminar'])->syncRoles([$role1]);

        Permission::create(['name' => 'empleados.index','grupo' => 'EMPLEADOS', 'descripcion' => 'Ver listado'])->syncRoles([$role1]);
        Permission::create(['name' => 'empleados.create','grupo' => 'EMPLEADOS', 'descripcion' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'empleados.edit','grupo' => 'EMPLEADOS', 'descripcion' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'empleados.destroy','grupo' => 'EMPLEADOS', 'descripcion' => 'Eliminar'])->syncRoles([$role1]);

    }
}
