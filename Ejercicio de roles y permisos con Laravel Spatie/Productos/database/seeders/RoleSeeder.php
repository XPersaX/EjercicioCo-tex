<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'Admin']);
        
        //Permisos para las vistas de los usuarios

        Permission::create(['name' => 'superadmin.users.index','description' => 'Ver Listado de los usuarios'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'superadmin.users.acciones','description' => 'Mostrar La acccionees en la lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.users.create','description' => 'Crear usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.users.edit','description' => 'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.users.destroy','description' => 'Eliminar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.users.show','description' => 'Ver Informaciòn usuarios'])->syncRoles([$role1]);

        //Permisos para las vistas de los roles

        Permission::create(['name' => 'superadmin.roles.index','description' => 'Ver Listado de los roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.roles.acciones','description' => 'Mostrar La acciones en la lista de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.roles.create','description' => 'Crear Role usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.roles.edit','description' => 'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.roles.destroy','description' => 'Eliminar Rol'])->syncRoles([$role1]);

        //Permisos para las vistas de los permisos

        Permission::create(['name' => 'superadmin.permisos.index','description' => 'Ver lista de permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.permisos.acciones','description' => 'Mostrar La acciones del listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.permisos.create','description' => 'Crear Permiso'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.permisos.edit','description' => 'Editar Permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.permisos.destroy','description' => 'Eliminar Permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'superadmin.permisos','description' => 'Ver Informaciòn de los permisos en el sistema'])->syncRoles([$role1]);

        //Permisos para las vistas de los productos

        Permission::create(['name' => 'superadmin.product.index','description' => 'Ver Pagina Inicio'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'superadmin.product.create','description' => 'Crear prodctos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'superadmin.product.edit','description' => 'Editar productos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'superadmin.product.destroy','description' => 'Eliminar productos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'superadmin.product.show','description' => 'Ver Informaciòn los productos'])->syncRoles([$role1,$role2]);
    }
}
