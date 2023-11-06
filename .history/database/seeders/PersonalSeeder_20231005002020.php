<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Rommel Eduardo',
            'email' => 'rommel@test.com',
            'password' => bcrypt('123'),
            'profile_photo_path' => '',
        ]);

        $jefePersonal->assignRole($jefePersonalRole);

        P

    }
}
