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

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
