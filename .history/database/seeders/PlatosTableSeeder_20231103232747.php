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
            'urlPlato' => 'platos/spaghetti.jpg', // Asegúrate de tener la imagen en storage/app/public/platos/
            'stock' => 10, // Ajusta el stock según sea necesario
            'categoria_id' => 1, // Ajusta la categoría según sea necesario (asegúrate de tener una categoría con el ID 1)
            'disponible' => true, // Ajusta la disponibilidad según sea necesario
        ]);

        Plato::create([
            'nombre' => 'Filete Mignon',
            'descripcion' => 'Filete de carne de res premium.',
            'tipoPlato' => 'Carne',
            'precio' => 25.99,
            'urlPlato' => 'platos/filete.jpg', // Asegúrate de tener la imagen en storage/app/public/platos/
            'stock' => 15, // Ajusta el stock según sea necesario
            'categoria_id' => 2, // Ajusta la categoría según sea necesario (asegúrate de tener una categoría con el ID 2)
            'disponible' => true, // Ajusta la disponibilidad según sea necesario
        ]);

        Plato::create([
            'nombre' => 'Ensalada César',
            'descripcion' => 'Ensalada fresca con pollo, crutones y aderezo César.',
            'tipoPlato' => 'Ensalada',
            'precio' => 8.99,
            'urlPlato' => 'platos/ensalada.jpg',
            'stock' => 20,
            'categoria_id' => 3,
            'disponible' => true,
        ]);

        Plato::create([
            'nombre' => 'Pizza Margherita',
            'descripcion' => 'Pizza clásica con tomate, mozzarella y albahaca fresca.',
            'tipoPlato' => 'Pizza',
            'precio' => 14.99,
            'urlPlato' => 'platos/pizza.jpg',
            'stock' => 12,
            'categoria_id' => 1,
            'disponible' => true,
        ]);
        
        Plato::create([
            'nombre' => 'Sushi Variado',
            'descripcion' => 'Selección de sushi fresco y variado.',
            'tipoPlato' => 'Sushi',
            'precio' => 18.99,
            'urlPlato' => 'platos/sushi.jpg',
            'stock' => 20,
            'categoria_id' => 2,
            'disponible' => true,
        ]);
        
        Plato::create([
            'nombre' => 'Hamburguesa Clásica',
            'descripcion' => 'Hamburguesa con carne de res, queso, lechuga y tomate.',
            'tipoPlato' => 'Hamburguesa',
            'precio' => 10.99,
            'urlPlato' => 'platos/hamburguesa.jpg',
            'stock' => 15,
            'categoria_id' => 3,
            'disponible' => true,
        ]);
        
        Plato::create([
            'nombre' => 'Tacos de Pescado',
            'descripcion' => 'Tacos con filete de pescado, repollo y salsa especial.',
            'tipoPlato' => 'Tacos',
            'precio' => 13.99,
            'urlPlato' => 'platos/tacos.jpg',
            'stock' => 18,
            'categoria_id' => 7,
            'disponible' => true,
        ]);
        
    }
}
