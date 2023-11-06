<?php

namespace Database\Seeders;

use App\Models\Bebida;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BebidasTableSeeder extends Seeder
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
        Bebida::truncate();

        // Crear algunas bebidas de ejemplo
        Bebida::create([
            'nombre' => 'Margarita',
            'descripcion' => 'Cóctel refrescante de tequila, triple sec y jugo de limón.',
            'tipoBebida' => 'Cóctel',
            'precio' => 8.99,
            'urlBebida' => 'bebidas/margarita.jpg', // Asegúrate de tener la imagen en storage/app/public/bebidas/
            'stock' => 20, // Ajusta el stock según sea necesario
            'categoria_id' => 3, // Ajusta la categoría según sea necesario (asegúrate de tener una categoría con el ID 3)
            'disponible' => true, // Ajusta la disponibilidad según sea necesario
        ]);

        Bebida::create([
            'nombre' => 'Cerveza IPA',
            'descripcion' => 'Cerveza India Pale Ale con lúpulos aromáticos.',
            'tipoBebida' => 'Cerveza',
            'precio' => 5.99,
            'urlBebida' => 'bebidas/ipa.jpg', // Asegúrate de tener la imagen en storage/app/public/bebidas/
            'stock' => 30, // Ajusta el stock según sea necesario
            'categoria_id' => 4, // Ajusta la categoría según sea necesario (asegúrate de tener una categoría con el ID 4)
            'disponible' => true, // Ajusta la disponibilidad según sea necesario
        ]);
    }
}
