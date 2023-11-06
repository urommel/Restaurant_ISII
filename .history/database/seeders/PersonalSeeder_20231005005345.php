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
            'apellido' => 'Ulco Chavarria',
            'phone' => '918812501',
            'dni' => '75704759',
            'salario' => '40',
            'fecha_inicio' => '10/01/2023',
        ]);

    }
}
