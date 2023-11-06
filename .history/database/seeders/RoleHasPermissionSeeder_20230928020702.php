<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::findByName('Admin');
        $adminRole->syncPermissions(Permission::all());

        $jefePersonalRole = Role::findByName('Jefe de Personal');
        $jefePersonalRole->syncPermissions([
            'Ver-Personal', 'Crear-Personal', 'Editar-Personal', 'Borrar-Personal',
        ]);
    }
}
