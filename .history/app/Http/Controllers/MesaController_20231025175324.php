<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
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
        return view('pages.mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.mesas.create');
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
        // Mesa::create($request->all());
        // return redirect()->route('mesas.index')->with('success', 'Mesa creada correctamente');

        $numeroMesas = $request->input('numero_mesas');

        // Obtener el número total actual de mesas
        $totalMesas = Mesa::count();

        // Crear mesas en un bucle
        for ($i = 1; $i <= $numeroMesas; $i++) {
            Mesa::create([
                'numero_mesa' => $totalMesas + $i,
                'estado' => 'libre', // Puedes establecer un estado por defecto si lo necesitas
            ]);
        }

        return redirect()->route('mesas.index')->with('success', 'Mesas creadas correctamente');


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
        $mesa = Mesa::findOrFail($id); // Busca la mesa por el ID
        return view('mesas.edit', compact('mesa'));
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
        $mesa = Mesa::findOrFail($id); // Busca la mesa por el ID
        $mesa->update($request->all());
    
        return redirect()->route('mesas.index')
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
        $mesa->delete();

        return redirect()->route('mesas.index')->with('success', 'Mesa eliminada correctamente');
    }
}
