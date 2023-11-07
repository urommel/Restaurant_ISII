<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Category;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::all();

        return view('pages.productos.index', compact('productos'));
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
        $tipos = Tipo::all();

        return view('pages.productos.create', compact('categorias', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;

        //
        // Verificar si se seleccionó "Crear Nuevo Tipo"
        if ($request->tipo_id === 'nuevoTipo') {
            $nuevoTipo = Tipo::create([
                'nombre' => $request->nuevo_tipo_plato,
            ]);

            $request->merge([
                'tipo_id' => $nuevoTipo->id,
            ]);
        }

        // Verificar si se seleccionó "Crear Nueva Categoría"
        if ($request->categoria_id === 'nueva') {
            $nuevaCategoria = Category::create([
                'nombre' => $request->nueva_categoria,
            ]);

            $request->merge([
                'categoria_id' => $nuevaCategoria->id,
            ]);
        }

        // Procesar la carga de la imagen y almacenar la ruta en la base de datos
        $imagenPath = $request->file('urlPlato')->store('tus_rutas_de_archivos');

        // Crear el producto con los datos de la solicitud y la ruta de la imagen
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo_id' => $request->tipo_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
            'url' => $imagenPath,
            'disponible' => $request->disponible,
            // ... otros campos según sea necesario
        ]);

        // Guardar el producto en la base de datos
        $producto->save();


        return redirect()->route('productos.index');
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
