<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

    }
}
