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
        $ordenes = Orden::all();
        return view('pages.ordenes.index', compact('mesas', 'ordenes'));
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
        //return $request;

        // Obtén los productos del request
        $productos = json_decode($request->input('productos'), true);

        // Crea una nueva orden
        $orden = new Orden();
        $orden->mesero = Auth::user()->name; // Puedes ajustar esto según la lógica de tu aplicación
        $orden->numero_mesa = $request->numero_mesa; // Ajusta esto según la lógica de tu aplicación
        $orden->observaciones = $request->obs;

        // Verifica si es cliente general o específico
        if ($request->general_customer) {
            // Si es cliente general, crea uno nuevo o recupera el existente
            $clienteGeneral = Client::firstOrCreate(
                ['name' => 'Cliente General'],
                ['client_type' => '1', 'identifier' => '00000000']
            );
            $orden->clients_id = $clienteGeneral->id;
        } else {
            // Si no es cliente general, utiliza el cliente específico seleccionado
            $orden->clients_id = $request->client_id;
        }

        $orden->save();

        // Inicializa el monto total de la orden
        $montoTotalOrden = 0;

        foreach ($productos as $producto) {
            // Crea un nuevo detalle de orden para cada producto
            $detalleOrden = new DetalleOrden();
            $detalleOrden->ordenes_id = $orden->id;
            $detalleOrden->producto_nombre = $producto['nombre'];
            $detalleOrden->cantidad = $producto['cantidad'];
            $detalleOrden->precio_unitario = $producto['precioUnitario'];
            $detalleOrden->precio_total = $producto['precioTotalPorUnidad'];
            $detalleOrden->save();

            // Suma el precio total por unidad al monto total de la orden
            $montoTotalOrden += $producto['precioTotalPorUnidad'];
        }

        // Guarda el monto total en la orden
        $orden->monto_total = $montoTotalOrden;
        $orden->estado_venta = 'pendiente'; // Puedes ajustar esto según tu lógica
        $orden->save();

        // Actualiza el estado de la mesa a 'ocupada'
        $mesa = Mesa::find($request->numero_mesa);
        $mesa->estado = 'ocupada'; // Puedes ajustar esto según tu lógica
        $mesa->save();

        // Otras acciones si es necesario

        // Redirecciona o responde según tus necesidades
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

        $productos = Producto::all();
        $mesas = Mesa::all();
        $orden = Orden::with(['detalles', 'cliente'])->findOrFail($id);
        // Obtén la orden con el ID proporcionado

        // Pasa la orden a la vista
        return view('pages.ordenes.show', compact('orden', 'productos', 'mesas'));
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

    public function pagar($id)
    {
        // Encuentra la orden por su ID
        $orden = Orden::findOrFail($id);

        // Actualiza el estado de la mesa a 'libre'
        $orden->mesa->estado = 'libre';
        $orden->mesa->save();

        // Cambia el estado de la orden a 'pagado' u otro estado según tu lógica
        $orden->estado_venta = 'pagado';
        $orden->save();

        // Redireccionar o realizar cualquier otra acción necesaria
        return redirect()->route('orden.index');

        // También puedes devolver una respuesta JSON u otra respuesta según tus necesidades
    }
}
