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
use Illuminate\Support\Facades\Auth;

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
        return $request;

        $productos = json_decode($request->input('productos'), true);

        // Crear una nueva orden
        $orden = new Orden();
        $orden->mesero = Auth::user()->name;
        $orden->numero_mesa = $request->numero_mesa;
        $orden->clients_id = $request->general_customer ? null : $request->client_id;
        $orden->observaciones = $request->obs;

        // Calcula el monto total sumando los precios totales de los productos
        $montoTotal = collect($productos)->sum(function ($producto) {
            return isset($producto['precio']) && isset($producto['cantidad'])
                ? $producto['precio'] * $producto['cantidad']
                : 0;
        });


        $orden->monto_total = $montoTotal;
        $orden->estado_venta = 'pendiente'; // O el estado que desees

        $orden->save();

        // Iterar sobre los productos y crear un nuevo detalle de orden para cada uno
        foreach ($productos as $producto) {
            $detalleOrden = new DetalleOrden();
            $detalleOrden->ordenes_id = $orden->id;
            $detalleOrden->producto_nombre = $producto['nombre'];
            $detalleOrden->cantidad = $producto['cantidad'];
            $detalleOrden->precio_unitario = $producto['precio'];
            $detalleOrden->precio_total = $producto['precio'] * $producto['cantidad'];
            $detalleOrden->save();
        }

        // Otras acciones si es necesario

        return redirect()->route('orden.index');
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
}
