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
                @foreach($bebidas as $bebida)
                    <li>{{ $bebida->nombre }} - Cantidad: {{ $bebida->pivot->cantidad }} - Precio: ${{ $bebida->precio }}</li>
                @endforeach

                @foreach($platos as $plato)
                    <li>{{ $plato->nombre }} - Cantidad: {{ $plato->pivot->cantidad }} - Precio: ${{ $plato->precio }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Confirmar Pedido -->
        <div>
            <h2 class="mb-2 text-xl font-bold">Confirmar Pedido</h2>
            
            <!-- Botón para confirmar pedido -->
            <form action="{{ route('ordenes.confirmarPedido', $mesa->id) }}" method="post">
                @csrf
                <button type="submit" class="p-2 mt-4 text-white bg-blue-500 rounded">Confirmar Pedido</button>
            </form>
        </div>
    </div>

    </div>
</x-app-layout>
