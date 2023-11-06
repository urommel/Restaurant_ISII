<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Orden;
use App\Models\Plato;
use App\Models\Bebida;
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
        $orden = Orden::with('mesa', 'bebidas', 'platos')->findOrFail($id);
        return view('ordenes.show', compact('orden'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
    public function show(Mesa $mesa)
    {
        //
        // Obtén bebidas y platos relacionados con la mesa a través de las órdenes
        $bebidas = Bebida::whereHas('ordenes', function ($query) use ($mesa) {
            $query->where('mesa_id', $mesa->id);
        })->get();

        $platos = Plato::whereHas('ordenes', function ($query) use ($mesa) {
            $query->where('mesa_id', $mesa->id);
        })->get();

        return view('ordenes.show', compact('mesa', 'bebidas', 'platos'));
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
