<div class="grid gap-6 mb-6 md:grid-cols-2">
    {{-- Apellidos --}}
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
        <input type="text" id="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="apellido" placeholder="" value="{{ old('apellido', $personal->apellido ?? '') }}" >
        <!-- Mensaje de éxito -->
        @if (session('success_message'))
            <p id="filled_success_help" class="mt-2 text-xs text-green-600 dark:text-green-400">
                <span class="font-medium">Well done!</span> {{ session('success_message') }}
            </p>
        @endif
    </div>
    {{-- Nombres --}}
    <div>
        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
        <input type="text" id="last_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="name" placeholder="" value="{{ old('name', $personal->user->name ?? '') }}" >
    </div>
    {{-- DNI --}}
    <div>
        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
        <input type="text" id="company"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="dni" placeholder="" value="{{ old('dni', $personal->dni ?? '') }}" >
    </div>
    {{-- # celular --}}
    <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero de
            celular</label>
        <input type="tel" id="phone"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="phone" placeholder="" value="{{ old('phone', $personal->phone ?? '') }}" >
    </div>
    {{-- Fecha ingreso --}}
    {{-- <div>
        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
            Ingreso</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="fecha_inicio" placeholder="Selecciona una Fecha"
                value="{{ old('fecha_inicio', $personal->fecha_inicio ?? '') }}" >
        </div>
    </div> --}}
    <div>
        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
            Ingreso</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="fecha_inicio" placeholder="Selecciona una Fecha"
                value="{{ old('fecha_inicio', $personal->fecha_inicio ?? '') }}" >
        </div>
    </div>
    {{-- Salario --}}
    <div>
        <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salario</label>
        <input type="number" id="visitors"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="salario" placeholder="" value="{{ old('fecha_inicio', $personal->salario ?? '') }}" >
    </div>
    {{-- Rol --}}
    <div>
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un
            rol</label>
        <select id="countries" name="role_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
            {{-- <option selected>.::Seleccionar::.</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', auth()->user()->roles->first()->id ?? '') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach --}}
            <option value="" {{ old('role_id') == '' ? 'selected' : '' }}>Seleccionar Rol</option>
            @foreach ($roles as $role)
                @php
                    $userRoles = optional($personal->user)->roles;
                    $firstRole = $userRoles ? $userRoles->first() : null;
                @endphp

                <option value="{{ $role->id }}"
                    {{ old('role_id', optional($firstRole)->id) == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>

    </div>
    {{-- Foto --}}
    {{-- <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cargar
            foto</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="file_input" type="file" name="profile_photo" >
    </div> --}}
    <!-- Foto -->
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Cargar foto</label>

        <!-- Verificar si $personal y $personal->user no son nulos y si ya hay una foto -->
        @if ($personal && $personal->user && $personal->user->profile_photo_path)
            <!-- Campo para cargar nueva foto (opcional) -->
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file" name="profile_photo">
        @else
            <!-- Campo para cargar foto cuando no hay foto existente o cuando $personal o $personal->user son nulos -->
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file" name="profile_photo" >
        @endif
    </div>


</div>
<div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
        Electronico</label>
    <input type="email" id="email"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="email" value="{{ old('email', $personal->user->email ?? '') }}" >
</div>
{{-- <div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
    <input type="password" id="password"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="password" value="{{ old('email', $personal->user->password ?? '') }}" >
</div> --}}
<div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
    <input type="password" id="password"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="password" @if (!isset($personal))  @endif>
</div>

<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>


{{-- <!-- Agrega un script para inicializar flatpickr -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.datepicker', {
            dateFormat: 'Y-m-d',
        });
    });
</script> --}}
