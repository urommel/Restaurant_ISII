<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="mb-4 text-2xl font-bold">Detalles de la Orden - Mesa {{ $mesa->numero }}</h1>

    <!-- Detalles de la orden y productos -->
    <div class="grid grid-cols-2 gap-4">
        <!-- Detalles de productos -->
        <div>
            <h2 class="mb-2 text-xl font-bold">Productos</h2>

            <!-- Lista de productos y cantidades -->
            <ul>
                @foreach($productos as $producto)
                    <li>{{ $producto->nombre }} - Cantidad: {{ $producto->cantidad }} - Precio: ${{ $producto->precio }}</li>
                @endforeach
            </ul>

            <button class="p-2 mt-4 text-white bg-blue-500 rounded">Confirmar Pedido</button>
        </div>

        <!-- Detalles de factura -->
        <div>
            <h2 class="mb-2 text-xl font-bold">Factura</h2>
            
            <!-- Detalles de factura -->
            <!-- ... -->

            <button class="p-2 mt-4 text-white bg-green-500 rounded">Pagar</button>
        </div>
    </div>

    </div>
</x-app-layout>