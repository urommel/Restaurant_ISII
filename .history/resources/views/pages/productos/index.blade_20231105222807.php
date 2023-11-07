<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Lista de Productos</h1>
    
            <a href="{{ route('productos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear Nuevo Producto</a>
    
            @if ($platos->count() > 0)
                <ul>
                    @foreach ($platos as $plato)
                        <li class="mb-4">
                            <h2 class="text-xl font-semibold">{{ $plato->nombre }}</h2>
                            <p>{{ $plato->descripcion }}</p>
                            <p><strong>Tipo de Plato:</strong> {{ $plato->tipoPlato }}</p>
                            <p><strong>Precio:</strong> ${{ $plato->precio }}</p>
                            {{-- <img src="{{ asset('storage/' . $plato->urlPlatos) }}" alt="{{ $plato->nombre }}" class="max-w-full mt-4"> --}}
                            <img src="{{ $plato->urlPlatos }}" alt="{{ $plato->nombre }}" class="max-w-full mt-4">

                            <div class="mt-4">
                                <a href="{{ route('productos.edit', $plato->id) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('prod.destroy', $plato->id) }}" method="post" class="inline">
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