<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use App\Models\Category;
use Illuminate\Http\Request;

class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bebidas = Bebida::all();
        return view('pages.bebidas.index', compact('bebidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categorias = Category::where('tipo', 'Bebida')->get();

        return view('pages.bebidas.create', compact('categorias'));
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
        $imagenPath = null;

        if ($request->hasFile('urlBebida')) {
            $imagenPath = $request->file('urlBebida')->store('bebidas', 'public');
        }

        Bebida::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipoBebida' => $request->tipoBebida,
            'precio' => $request->precio,
            'urlBebida' => $imagenPath,
        ]);

        return redirect()->route('bebidas.index')
            ->with('success', 'Bebida creada exitosamente.');
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
