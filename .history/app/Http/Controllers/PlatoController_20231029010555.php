<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plato;

use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $platos = Plato::all();
        return view('pages.platos.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categorias = Category::all();

        return view('pages.platos.create', compact('categorias'));
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


        // Validar y guardar los demás campos del formulario

        $categoriaId = $request->input('categoria_id');
        if ($categoriaId === 'nueva') {
            // Crear una nueva categoría
            $nuevaCategoria = new Categoria(['nombre' => $request->input('nueva_categoria')]);
            $nuevaCategoria->save();

            // Asignar el ID de la nueva categoría al plato
            $plato->categoria_id = $nuevaCategoria->id;
        } else {
            // Asignar la categoría existente al plato
            $plato->categoria_id = $categoriaId;
        }

        // Guardar el plato
        $plato->save();

        if ($request->hasFile('urlPlato')) {
            $imagenPath = $request->file('urlPlato')->store('platos', 'public');
        }

        Plato::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipoPlato' => $request->tipoPlato,
            'precio' => $request->precio,
            'urlPlato' => $imagenPath,
        ]);

        return redirect()->route('platos.index')
            ->with('success', 'Plato creado exitosamente.');
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
