<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Tipos
        $tipos = [
            [
                'nombre' => 'Plato',
            ],
            [
                'nombre' => 'Bebida',
            ],
        ];

        Tipo::insert($tipos);
    }
}
