<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personals = Personal::with('user')->paginate(10);
        return view('pages.personal.index', compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        // return $request;



        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->email = strtolower(substr($request->input('apellido'), 0, 1) . $primerNombre . '@test.com');
        $user->password = Hash::make(ucfirst($request->input('apellido')[0]) . strtolower($request->input('name')[0]) . $request->input('dni'));
        $user->save();

        // Obtener la fecha del formulario en el formato MM/DD/YYYY
        $fechaInicio = $request->input('fecha_inicio');

        // Convertir la fecha al formato correcto (YYYY-MM-DD)
        $fechaInicioFormatted = date('Y-m-d', strtotime($fechaInicio));

        // Crear un nuevo empleado y asociarlo con el usuario
        $empleado = new Personal();
        $empleado->apellido = $request->input('apellido');
        $empleado->phone = $request->input('phone');
        $empleado->dni = $request->input('dni');
        $empleado->salario = $request->input('salario');
        $empleado->fecha_inicio = $fechaInicioFormatted; // Utilizar el formato correcto
        $empleado->user_id = $user->id; // Asociar el empleado con el usuario recién creado
        $empleado->save();

        return redirect()->route('personal.index');
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
