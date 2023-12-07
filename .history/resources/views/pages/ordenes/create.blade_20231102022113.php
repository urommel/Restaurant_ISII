<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1>Detalles de la orden</h1>
<p>Mesa: {{ $orden->mesa->nombre }}</p>

<h2>Bebidas</h2>
@foreach($orden->bebidas as $bebida)
    <p>{{ $bebida->nombre }} - Cantidad: {{ $bebida->pivot->cantidad }} - Precio: {{ $bebida->pivot->precio }}</p>
@endforeach

<h2>Platos</h2>
@foreach($orden->platos as $plato)
    <p>{{ $plato->nombre }} - Cantidad: {{ $plato->pivot->cantidad }} - Precio: {{ $plato->pivot->precio }}</p>
@endforeach

<button onclick="confirmarPedido({{ $orden->id }})" class="px-4 py-2 text-white bg-green-500">Confirmar Pedido</button>

<script>
    function confirmarPedido(ordenId) {
        // Lógica para confirmar el pedido utilizando JavaScript y AJAX
    }
</script>

    </div>
</x-app-layout>
