<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // Categorías para platos
        $categoriasPlatos = [
            ['nombre' => 'Entradas'],
            ['nombre' => 'Platos Principales'],
            ['nombre' => 'Postres'],
            // Agrega más categorías según sea necesario
        ];

        // Inserta los datos en la tabla de categorías para platos
        $categoriasPlatos = DB::table('categorias')->insertGetId($categoriasPlatos);

        // Categorías para bebidas
        $categoriasBebidas = [
            ['nombre' => 'Bebidas Calientes'],
            ['nombre' => 'Bebidas Frías'],
            // Agrega más categorías según sea necesario
        ];

        // Inserta los datos en la tabla de categorías para bebidas
        $categoriasBebidas = DB::table('categorias')->insertGetId($categoriasBebidas);
    }
}
