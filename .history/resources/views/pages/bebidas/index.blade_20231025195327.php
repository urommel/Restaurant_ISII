<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Lista de Bebidas</h1>
    
            <a href="{{ route('bebidas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear Nueva Bebida</a>
    
            @if ($bebidas->count() > 0)
                <ul>
                    @foreach ($bebidas as $bebida)
                        <li class="mb-4">
                            <h2 class="text-xl font-semibold">{{ $bebida->nombre }}</h2>
                            <p>{{ $bebida->descripcion }}</p>
                            <p><strong>Tipo de Bebida:</strong> {{ $bebida->tipoBebida }}</p>
                            <p><strong>Precio:</strong> ${{ $bebida->precio }}</p>
                            <img src="{{ $bebida->urlBebidas }}" alt="{{ $bebida->nombre }}" class="max-w-full mt-4">
                            
                            <div class="mt-4">
                                <a href="{{ route('bebidas.edit', $bebida->id) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('bebidas.destroy', $bebida->id) }}" method="post" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-4">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No hay bebidas disponibles.</p>
            @endif
        </div>
    </div>
</x-app-layout>