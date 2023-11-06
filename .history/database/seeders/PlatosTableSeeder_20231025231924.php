<?php

namespace Database\Seeders;

use App\Models\Plato;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Limpiar la tabla antes de llenarla
        Plato::truncate();

        // Crear algunos platos de ejemplo
        Plato::create([
            'nombre' => 'Spaghetti Bolognese',
            'descripcion' => 'Deliciosos spaghetti con salsa boloñesa.',
            'tipoPlato' => 'Pasta',
            'precio' => 12.99,
            'imagen' => 'platos/spaghetti.jpg', // Asegúrate de tener la imagen en storage/app/public/platos/
        ]);

        Plato::create([
            'nombre' => 'Filete Mignon',
            'descripcion' => 'Filete de carne de res premium.',
            'tipoPlato' => 'Carne',
            'precio' => 25.99,
            'imagen' => 'platos/filete.jpg', // Asegúrate de tener la imagen en storage/app/public/platos/
        ]);

    }
}
