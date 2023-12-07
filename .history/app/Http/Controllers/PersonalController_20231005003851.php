<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Personal;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
        $users = User::with('roles')->get();
        return view('pages.personal.index', compact('personals', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personal = new Personal();
        $roles = Role::all();

        return view('pages.personal.create', compact('roles', 'personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate((new Personal)->rules());

        //return $request;


        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }
        $user->assignRole($request->input('role_id'));
        $user->save();

        // Obtener la fecha del formulario en el formato MM/DD/YYYY
        $fechaInicio = $request->input('fecha_inicio');

        // Convertir la fecha al formato correcto (YYYY-MM-DD)
        $fechaInicioFormatted = date('Y-m-d', strtotime($fechaInicio));

        // Crear un nuevo empleado y asociarlo con el usuario
        $personal = new Personal();
        $personal->apellido = $request->input('apellido');
        $personal->phone = $request->input('phone');
        $personal->dni = $request->input('dni');
        $personal->salario = $request->input('salario');
        $personal->fecha_inicio = $fechaInicioFormatted; // Utilizar el formato correcto
        $personal->user_id = $user->id; // Asociar el empleado con el usuario recién creado
        $personal->save();

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
        // Obtener el personal por su ID
        $personal = Personal::findOrFail($id);

        // Renderizar la vista para mostrar los detalles del personal
        return view('pages.personal.show', compact('personal'));
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
        // Obtener el personal por su ID
        $personal = Personal::findOrFail($id);
        $roles = Role::all();

        // Renderizar la vista de edición con los datos del personal y los roles
        return view('pages.personal.edit', compact('personal', 'roles'));
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
        // // Validar los datos del formulario
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        //     // Agrega más reglas de validación según tus necesidades
        // ]);

        $personal = Personal::findOrFail($id);
        $user = $personal->user; // Obtener el usuario asociado

        // Actualizar los campos del usuario
        $user->fill([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->assignRole($request->input('role_id'));
        $user->save();

        // Asegurarse de que la fecha esté en el formato correcto (YYYY-MM-DD)
        $fechaInicio = date('Y-m-d', strtotime($request->input('fecha_inicio')));

        // Actualizar las columnas específicas de Personal
        $personal->fill([
            'apellido' => $request->input('apellido'),
            'phone' => $request->input('phone'),
            'dni' => $request->input('dni'),
            'fecha_inicio' => $fechaInicio,
            'salario' => $request->input('salario'),
        ]);

        $personal->save();


        return redirect()->route('personal.index');
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
        // Obtener el personal por su ID
        $personal = Personal::findOrFail($id);

        // Eliminar el usuario asociado (esto eliminará también el personal debido a las relaciones)
        $personal->user->delete();

        return redirect()->route('personal.index');
    }
}
