<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\User;
use App\Models\Orden;
use App\Models\Plato;
use App\Models\Bebida;
use App\Models\Client;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mesas = Mesa::all();
        $clients = Client::all();


        return view('pages.orders.index', compact('mesas', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mesas_id)
    {
        //
        $users = User::all();
        $mesas = Mesa::findOrFail($mesas_id);
        $clients = Client::all();
        $platos = Plato::all();
        $bebidas = Bebida::all();

        // Obtén el cliente general
        $general_client = Client::where('name', 'Cliente General')->first();

        // Si no se encontró el cliente general, crea uno nuevo
        if ($general_client === null) {
            $general_client = new Client;
            $general_client->name = 'Cliente General';
            $general_client->identifier = 'some_identifier'; // Reemplaza 'some_identifier' con el valor que quieras
            $general_client->save();
        }

        return view('pages.orders.create', compact('mesas', 'clients', 'platos', 'bebidas', 'general_client', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Crear una nueva instancia de Orden
        $orden = new Orden();

        // Asignar valores a las propiedades del modelo
        $orden->mesa = $request->mesa;
        $orden->mesero = $request->mesero;
        $orden->cliente = $request->cliente;
        $orden->observaciones = $request->observaciones;

        // Calcular el total de la orden sumando los productos
        $totalOrden = 0;
        foreach ($request->productos as $producto) {
            $totalOrden += $producto['precio'] * $producto['cantidad'];
        }

        $orden->total = $totalOrden;

        // Guardar la orden en la base de datos
        $orden->save();

        // Asignar productos a la orden (si los hay)
        foreach ($request->productos as $producto) {
            $orden->productos()->create([
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => $producto['cantidad'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
