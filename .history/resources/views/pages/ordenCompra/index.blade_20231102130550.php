<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Órdenes de Compra</h1>

    @foreach($ordenesCompra as $ordenCompra)
        <div class="bg-gray-100 p-4 rounded mb-4">
            <h3 class="text-lg font-bold mb-2">Orden de Compra #{{ $ordenCompra->id }}</h3>
            <p>Proveedor: {{ $ordenCompra->proveedor->nombre }}</p>

            <h4 class="text-md font-semibold mt-2 mb-1">Detalles:</h4>
            <ul class="list-disc pl-4">
                @foreach($ordenCompra->detallesOrdenCompra as $detalle)
                    <li>
                        {{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }},
                        Precio Unitario: ${{ $detalle->precio_unitario }}
                    </li>
                @endforeach
            </ul>

            <p class="mt-2">Estado: {{ $ordenCompra->estado }}</p>
        </div>
    @endforeach

    </div>
</x-app-layout>
