<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $proveedores = [
            [
                'compañia' => 'Proveedor A',
                'representante' => 'Representante A',
                'ruc' => '123456789',
                'celular' => '123-456-7890',
                'direccion' => 'Calle Principal 123',
                'email' => 'proveedorA@example.com',
                'estado' => 'pendiente',
            ],
            [
                'compañia' => 'Proveedor B',
                'representante' => 'Representante B',
                'ruc' => '987654321',
                'celular' => '987-654-3210',
                'direccion' => 'Avenida Secundaria 456',
                'email' => 'proveedorB@example.com',
                'estado' => 'aprobada',
            ],
            // Agrega más proveedores según sea necesario
        ];

        for ($i = 0; $i < count($proveedores); $i++) {
            Proveedor::create($proveedores[$i]);
        }
    }
}
