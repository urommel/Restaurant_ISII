<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Llenar la tabla de mesas con un bucle for
        for ($i = 1; $i <= 10; $i++) {
            Mesa::create([
                'numero_mesa' => $i,
                'estado' => 'libre',
            ]);
        }
    }
}
