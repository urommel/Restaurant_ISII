<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\OrdenCompra;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ordenesCompra = OrdenCompra::with('proveedor', 'detallesOrdenCompra.producto')->get();

        return view('pages.ordenCompra.index', compact('ordenesCompra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores = Proveedor::all();

        return view('pages.ordenCompra.create', compact('proveedores'));
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
        // Crear la nueva orden de compra
        $ordenCompra = OrdenCompra::create([
            'proveedor_id' => $request->proveedor_id,
            'estado' => $request->estado, // Ajusta según los campos de tu modelo
        ]);

        // Adjuntar detalles a la orden de compra
        foreach ($request->detalles as $detalle) {
            $ordenCompra->detallesOrdenCompra()->create([
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'precio_unitario' => $detalle['precio_unitario'],
            ]);
        }

        return redirect()->route('ordenes-compra.index');
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
