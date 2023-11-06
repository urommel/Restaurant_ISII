<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Orden;
use App\Models\Client;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Obtener todas las órdenes
        $ordenes = Orden::with(['mesa', 'cliente', 'detalles'])->get();

        // Mostrar vista con órdenes
        return view('ordenes.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Obtener mesas disponibles para hacer la orden
        $mesasDisponibles = Mesa::whereDoesntHave('ordenes', function ($query) {
            $query->where('estado', 'pendiente');
        })->get();

        // Obtener clientes
        $clientes = Client::all();

        // Obtener platos y bebidas
        $platos = Plato::all();
        $bebidas = Bebida::all();

        // Mostrar formulario para crear una nueva orden
        return view('ordenes.create', compact('mesasDisponibles', 'clientes', 'platos', 'bebidas'));
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
        // Crear la orden
        $orden = Orden::create([
            'mesa_id' => $request->mesa_id,
            'cliente_id' => $request->cliente_id,
            'estado' => 'pendiente', // Agrega el estado pendiente
        ]);

        // Redireccionar a la página para añadir pedidos
        return redirect()->route('ordenes.edit', $orden->id)
            ->with('success', 'Orden creada exitosamente. Añade los pedidos.');
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
