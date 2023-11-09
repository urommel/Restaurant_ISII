<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\User;
use App\Models\Orden;
use App\Models\Plato;
use App\Models\Bebida;
use App\Models\Client;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\DetalleOrden;
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
        $mesas = Mesa::all();
        return view('pages.ordenes.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mesas_id)
    {
        //
        
        // $categorias = Categoria::with('productos')->get();
        $users = User::all();
        $mesas = Mesa::findOrFail($mesas_id);
        $clients = Client::all();
        $productos = Producto::all();
        $categorias = Categoria::all();


        return view('pages.ordenes.create', compact('mesas', 'clients', 'productos', 'users', 'categorias'));
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
        $orden = Orden::with('mesa', 'bebidas', 'platos')->findOrFail($id);
        return view('pages.ordenes.show', compact('orden'));
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


    public function crearOrden(Request $request)
    {
        return 
        // Crear una nueva orden
        $orden = new Orden();
        $orden->mesero = $request->input('mesero');
        $orden->numero_mesa = $request->input('numeroMesa');
        $orden->cliente_id = $request->input('clienteId');
        $orden->observaciones = $request->input('observaciones');
        $orden->save();

        // Obtener el ID de la orden creada
        $ordenId = $orden->id;

        // Crear detalles de la orden
        foreach ($request->input('productos') as $producto) {
            $detalleOrden = new DetalleOrden();
            $detalleOrden->orden_id = $ordenId;
            $detalleOrden->producto_nombre = $producto['nombre'];
            $detalleOrden->cantidad = $producto['cantidad'];
            $detalleOrden->precio_unitario = $producto['precio'];
            $detalleOrden->precio_total = $producto['precioTotal'];
            $detalleOrden->save();
        }

        // Devolver la respuesta con los detalles de la orden
        return response()->json([
            'ordenId' => $ordenId,
            'mesero' => $orden->mesero,
            'numeroMesa' => $orden->numero_mesa,
            'clienteId' => $orden->cliente_id,
            'observaciones' => $orden->observaciones,
            'productos' => $orden->detalles,
        ]);

        return redirect()->route('orden.index');
    }



}
