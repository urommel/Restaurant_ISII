<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Lista de Productos</h1>
    
            <a href="{{ route('productos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear Nuevo Producto</a>
    
            @if ($productos->count() > 0)
                <ul>
                    @foreach ($productos as $producto)
                        <li class="mb-4">
                            <h2 class="text-xl font-semibold">{{ $producto->nombre }}</h2>
                            <p>{{ $producto->descripcion }}</p>
                            <p><strong>Categoria: </strong> {{ $producto-> }}</p>
                            <p><strong>Tipo de Plato: </strong> {{ $producto->tipo->nombre }}</p>
                            <p><strong>Precio: </strong> ${{ $producto->precio }}</p>
                            {{-- <img src="{{ asset('storage/' . $plato->urlPlatos) }}" alt="{{ $plato->nombre }}" class="max-w-full mt-4"> --}}
                            <img src="{{ $producto->urlPlatos }}" alt="{{ $producto->nombre }}" class="max-w-full mt-4">

                            <div class="mt-4">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-4">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No hay platos disponibles.</p>
            @endif
        </div>

    </div>
</x-app-layout>