<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::with('mesa', 'client')->get();
        return view('pages.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mesas = Mesa::all();
        $clients = Client::all();
        return view('pages.reservation.create', compact('mesas', 'clients'));
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
        // Crear la reserva
        // Reservation::create($request->all());

        // Almacenar la reserva
        $reservation = Reservation::create([
            'mesa_id' => $request->mesa_id,
            'client_id' => $request->client_id,
            'reservation_datetime' => $request->reservation_datetime,
            'notes' => $request->notes,
            'status' => 'pending', // O el estado por defecto que desees
        ]);

        // Actualizar el estado de la mesa a 'reservada'
        $mesa = Mesa::find($request->mesa_id);
        $mesa->estado = 'reservada';
        $mesa->save();

        return redirect()->route('reservation.index')->with('success', 'Reserva creada exitosamente.');
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

    public function confirm(Reservation $reservation)
    {
        $reservation->update(['status' => 'confirmed']);
        return redirect()->route('reservation.index')->with('success', 'Reserva confirmada exitosamente.');
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->update(['status' => 'cancelled']);
        return redirect()->route('reservation.index')->with('success', 'Reserva cancelada exitosamente.');
    }
}
