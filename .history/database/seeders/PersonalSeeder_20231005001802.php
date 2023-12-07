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
            'name' => 'Jefe de Personal',
            'email' => '',
            'password' => bcrypt('123'),
        ]);

        $jefePersonal->assignRole($jefePersonalRole);

    }
}
