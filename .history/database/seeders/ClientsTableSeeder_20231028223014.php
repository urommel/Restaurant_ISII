<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Seed data for the clients table
        $clients = [
            [
                'name' => 'Cliente 1',
                'email' => 'cliente1@example.com',
                'client_type' => 'RUC',
                'identifier' => '12345678901',
            ],
            [
                'name' => 'Cliente 2',
                'email' => 'cliente2@example.com',
                'client_type' => 'DNI',
                'identifier' => '12345678',
            ],
            // Agrega más datos según sea necesario
        ];

        // Insertar datos en la tabla
        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
