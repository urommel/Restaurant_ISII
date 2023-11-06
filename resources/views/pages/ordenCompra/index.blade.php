<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Órdenes de Compra</h1>

        <a href="{{ route('orden_compra.create') }}"
            class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Crear Nueva Orden de Compra</a>

        @if ($ordenesCompra->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Proveedor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ordenesCompra as $orden)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $orden->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $orden->proveedor->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $orden->estado }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('orden_compra.show', $orden->id) }}"
                                    class="text-blue-500 hover:underline">Ver Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay órdenes de compra disponibles.</p>
        @endif

    </div>
</x-app-layout>
