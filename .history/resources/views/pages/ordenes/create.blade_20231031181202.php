<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Crear Nueva Orden</h1>

        <form action="{{ route('ordenes.store') }}" method="post" class="max-w-md">
            @csrf

            <div class="mb-4">
                <label for="mesa_id" class="block text-sm font-bold mb-2">Seleccione una mesa:</label>
                <select name="mesa_id" id="mesa_id" required class="w-full p-2 border rounded">
                    @foreach ($mesasDisponibles as $mesa)
                        <option value="{{ $mesa->id }}">{{ $mesa->numero }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="cliente_id" class="block text-sm font-bold mb-2">Seleccione un cliente:</label>
                <select name="cliente_id" id="cliente_id" required class="w-full p-2 border rounded">
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Resto del formulario... -->

            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Agregar Orden</button>
        </form>

    </div>
</x-app-layout>
