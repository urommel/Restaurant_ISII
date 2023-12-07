<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'Ver-Rol', 'Crear-Rol', 'Editar-Rol', 'Borrar-Rol',
            'Ver-Usuario', 'Crear-Usuario', 'Editar-Usuario', 'Borrar-Usuario',
            'Ver-Personal', 'Crear-Personal', 'Editar-Personal', 'Borrar-Personal',
            'Ver-Mesa', 'Crear-Mesa', 'Editar-Mesa', 'Borrar-Mesa',
            'Ver-Cliente', 'Crear-Cliente', 'Editar-Cliente', 'Borrar-Cliente',
            // Agrega más permisos según tus necesidades
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                // 'guard_name' => 'sanctum', // Especifica el guard_name
            ]);
        }
    }
}
