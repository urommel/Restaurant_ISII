<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $productos = [
        //     ['nombre' => 'Filete de Ternera', 'precio' => 15.99, 'stock' => 50],
        //     ['nombre' => 'Salmón Fresco', 'precio' => 25.99, 'stock' => 30],
        //     ['nombre' => 'Pasta Integral', 'precio' => 3.99, 'stock' => 100],
        //     ['nombre' => 'Aceite de Oliva Extra Virgen', 'precio' => 9.99, 'stock' => 40],
        //     // Agrega más productos según sea necesario
        // ];

        $productos = [
            [
                'nombre' => 'Yuca frita',
                'descripcion' => 'Yuca frita con salsa de ají',
                'precio' => 5.00,
                'url' => null,
                'stock' => 0,
                'disponible' => true,
                'categorias_id' => 1, // Entrantes
                'tipos_id' => 1, // Plato
            ],
            [
                'nombre' => 'Ají de Gallina',
                'descripcion' => 'Estofado de pollo con salsa de ají amarillo',
                'precio' => 9.00,
                'url' => null,
                'stock' => 0,
                'disponible' => true,
                'categorias_id' => 1, // Entrantes
                'tipos_id' => 1, // Plato
            ],
            [
                'nombre' => 'Papa a la Huancaina',
                'descripcion' => 'Patatas con salsa de queso y ají amarillo',
                'precio' => 9.00,
                'url' => null,
                'stock' => 0,
                'disponible' => true,
                'categorias_id' => 1, // Entrantes
                'tipos_id' => 1, // Plato
            ],
            [
                'nombre' => 'Causa Limeña',
                'descripcion' 'Pastel de patata con pollo, aguacate y mayonesa',
                'precio' => 6.50,
                'url' => null,
                'stock' => 0,
                'disponible' => true,
                'categorias_id' => 1, // Entrantes
                'tipos_id' => 1, // Plato
            ],
            
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
