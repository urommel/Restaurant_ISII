<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     [
        //         "id" => 01,
        //         "name" => "Admin",
        //         "email" => "admin@test.com",
        //         "password" => bcrypt("123"),
        //         "created_at" => "2023-09-20 20:35:52",
        //     ],
        // ]);


        $adminRole = Role::where('name', 'Admin')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole($adminRole);
    }

}
