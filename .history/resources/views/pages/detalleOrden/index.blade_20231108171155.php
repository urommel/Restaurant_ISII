<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <!-- Contenido existente de la vista -->

        <div class="mt-8">
            <!-- Sección para mostrar detalles de la orden y factura -->
            <h2 class="mb-4 text-xl font-bold">Detalles de la Orden y Factura</h2>

            <!-- Muestra los detalles de la orden -->
            <div class="bg-white p-4 rounded-lg shadow">
                <p><strong>ID de Orden:</strong> {{ $detallesOrden['ordenId'] }}</p>
                <p><strong>Mesero:</strong> {{ $detallesOrden['mesero'] }}</p>
                <p><strong>Número de Mesa:</strong> {{ $detallesOrden['numeroMesa'] }}</p>
                <p><strong>Cliente:</strong> {{ $detallesOrden['clienteId'] }}</p>
                <p><strong>Observaciones:</strong> {{ $detallesOrden['observaciones'] }}</p>
            </div>

            <!-- Muestra la factura -->
            <div class="mt-4 bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-2">Productos:</h3>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Producto</th>
                            <th scope="col" class="px-6 py-3">Cantidad</th>
                            <th scope="col" class="px-6 py-3">Precio Unitario</th>
                            <th scope="col" class="px-6 py-3">Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detallesOrden['productos'] as $producto)
                            <tr>
                                <td class="px-6 py-4">{{ $producto['nombre'] }}</td>
                                <td class="px-6 py-4">{{ $producto['cantidad'] }}</td>
                                <td class="px-6 py-4">${{ $producto['precio'] }}</td>
                                <td class="px-6 py-4">${{ $producto['precioTotal'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <p class="text-lg font-bold">Monto Total: ${{ $montoTotal }}</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>