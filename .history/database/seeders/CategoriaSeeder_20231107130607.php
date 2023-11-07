<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // // Categorías para platos
        // $categoriasPlatos = [
        //     ['nombre' => 'Entradas', 'tipo' => 'Plato'],
        //     ['nombre' => 'Platos Principales', 'tipo' => 'Plato'],
        //     ['nombre' => 'Postres', 'tipo' => 'Plato'],
        //     // Agrega más categorías según sea necesario
        // ];

        // // Inserta los datos en la tabla de categorías para platos
        // DB::table('categorias')->insert($categoriasPlatos);

        // // Categorías para bebidas
        // $categoriasBebidas = [
        //     ['nombre' => 'Bebidas Calientes', 'tipo' => 'Bebida'],
        //     ['nombre' => 'Bebidas Frías', 'tipo' => 'Bebida'],
        //     // Agrega más categorías según sea necesario
        // ];

        // // Inserta los datos en la tabla de categorías para bebidas
        // DB::table('categorias')->insert($categoriasBebidas);


        // Categorias
        $categorias = [
            [
                'nombre' => 'Entrantes',
                'descripcion' => 'Entrantes ligeros y sabrosos.',
            ],
            [
                
            ]
            [
                'nombre' => 'Platos principales',
                'descripcion' => 'Platos principales contundentes y deliciosos.',
            ],
            [
                'nombre' => 'Postres',
                'descripcion' => 'Postres dulces y tentadores.',
            ],
        ];

        Categoria::insert($categorias);
    }
}
