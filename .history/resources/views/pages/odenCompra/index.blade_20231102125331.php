<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1>Órdenes de Compra</h1>

    @foreach($ordenesCompra as $ordenCompra)
        <div>
            <h3>Orden de Compra #{{ $ordenCompra->id }}</h3>
            <p>Proveedor: {{ $ordenCompra->proveedor->nombre }}</p>
            
            <h4>Detalles:</h4>
            <ul>
                @foreach($ordenCompra->detallesOrdenCompra as $detalle)
                    <li>{{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }}, Precio Unitario: ${{ $detalle->precio_unitario }}</li>
                @endforeach
            </ul>

            <p>Estado: {{ $ordenCompra->estado }}</p>
            <hr>
        </div>
    @endforeach

    </div>
</x-app-layout>