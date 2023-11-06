<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Crear Nueva Orden de Compra</h1>

        <form action="{{ route('orden_compra.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="proveedor_id" class="block text-sm font-medium text-gray-600">Proveedor:</label>
                <select name="proveedor_id" id="proveedor_id" class="mt-1 p-2 border rounded w-full">
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="estado" class="block text-sm font-medium text-gray-600">Estado:</label>
                <input type="text" name="estado" id="estado" class="mt-1 p-2 border rounded w-full">
            </div>

            <h2 class="text-lg font-semibold mb-2">Detalles de la Orden de Compra:</h2>

            <!-- Campos para detalles como producto, cantidad, precio unitario, etc. -->
            <div class="grid grid-cols-3 gap-4">
                @foreach ($productos as $producto)
                    <div>
                        <label for="detalles[{{ $producto->id }}][cantidad]"
                            class="block text-sm font-medium text-gray-600">{{ $producto->nombre }}</label>
                        <input type="number" name="detalles[{{ $producto->id }}][cantidad]"
                            class="mt-1 p-2 border rounded w-full">
                    </div>
                @endforeach
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Guardar Orden de
                Compra</button>
        </form>

    </div>
</x-app-layout>
