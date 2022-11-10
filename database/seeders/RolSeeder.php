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
        $role3 = Role::create((['name' => 'User']));

        Permission::create(['name' => 'home','grupo' => 'Inicio', 'descripcion' => 'Home'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'users.index','grupo' => 'USUARIOS', 'descripcion' => 'Ver listado'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'users.edit','grupo' => 'USUARIOS', 'descripcion' => 'Asignar Rol'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name' => 'empresas.index','grupo' => 'EMPRESAS', 'descripcion' => 'Ver listado'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'empresas.create','grupo' => 'EMPRESAS', 'descripcion' => 'Crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'empresas.edit','grupo' => 'EMPRESAS', 'descripcion' => 'Editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'empresas.destroy','grupo' => 'EMPRESAS', 'descripcion' => 'Eliminar'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'roles.index','grupo' => 'ROLES', 'descripcion' => 'Ver listado'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.create','grupo' => 'ROLES', 'descripcion' => 'Crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.edit','grupo' => 'ROLES', 'descripcion' => 'Editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.destroy','grupo' => 'ROLES', 'descripcion' => 'Eliminar'])->syncRoles([$role1,$role2]);

    }
}
