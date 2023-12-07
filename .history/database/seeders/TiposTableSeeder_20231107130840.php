<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            [
                'nombre' => 'Postre',
            ]
        ];

        Tipo::insert($tipos);
    }
}
