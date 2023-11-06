<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            // DashboardTableSeeder::class,
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            UserSeeder::class,
            RoleHasPermissionSeeder::class,
            PersonalSeeder::class,
            MesaSeeder::class,
            
            CategoriaSeeder::class,
            PlatosTableSeeder::class,
            BebidasTableSeeder::class,
        ]);

    }
}
