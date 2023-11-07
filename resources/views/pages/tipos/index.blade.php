<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold leading-tight mb-4">Tipos de Productos</h2>

            <a href="{{ route('tipos.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                Crear Nuevo Tipo
            </a>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($tipos as $tipo)
                    <div class="bg-white overflow-hidden shadow-md rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold">{{ $tipo->nombre }}</h3>
                            {{-- <p class="text-gray-600">{{ $tipoProducto->descripcion }}</p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
