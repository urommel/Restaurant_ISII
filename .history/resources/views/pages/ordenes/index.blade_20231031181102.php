<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Lista de Órdenes</h1>

        @foreach ($ordenes as $orden)
            <div class="border p-4 mb-4">
                <p class="text-lg">Mesa: {{ $orden->mesa->numero }}</p>
                <p class="text-lg">Cliente: {{ $orden->cliente->nombre }}</p>
                <p class="text-lg">Estado: {{ $orden->estado }}</p>
                <a href="{{ route('orden.edit', $orden->id) }}" class="text-blue-500 hover:underline">Agregar Pedido</a>
            </div>
        @endforeach

    </div>
</x-app-layout>
