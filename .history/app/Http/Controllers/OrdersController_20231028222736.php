<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use App\Models\Client;
use App\Models\Mesa;
use App\Models\Plato;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
        $clients = Client::all();


        return view('pages.orders.index', compact('mesas', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mesas_id)
    {
        //
        $mesas = Mesa::findOrFail($mesas_id);
        $clients = Client::all();
        $platos = Plato::all();
        $bebidas = Bebida::all();

        // Obtén el cliente general
        $general_client = Client::where('name', 'Cliente General')->first();

        // Si no se encontró el cliente general, crea uno nuevo
    if ($general_client === null) {
        $general_client = new Client;
        $general_client->name = 'Cliente General';
        $general_client->identifier = 'some_identifier'; // Reemplaza 'some_identifier' con el valor que quieras
        $general_client->save();
    }

        return view('pages.orders.create', compact('mesas', 'clients', 'platos', 'bebidas', 'general_client'));
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
