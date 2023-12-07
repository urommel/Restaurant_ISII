<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Personal;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $jefePersonalRole = Role::findByName('Jefe de Personal');

        $jefePersonal = User::create([
            'id' => '02',
            'name' => 'Rommel Eduardo',
            'email' => 'rommel@test.com',
            'password' => bcrypt('123'),
            'profile_photo_path' => '',
        ]);

        $jefePersonal->assignRole($jefePersonalRole);

        Personal::create([
            'user_id' => $jefePersonal->id,
            'nombre' => 'Rommel Eduardo',
            'apellido' => 'Gonzalez',
            'cedula' => 'V-12345678',
            'telefono' => '0414-1234567',
            'direccion' => 'Av. 123',
            'fecha_nacimiento' => '1999-09-20',
            'fecha_ingreso' => '2021-09-20',
            'sueldo' => '100',
            'estado' => 'Activo',
        ]);

    }
}
