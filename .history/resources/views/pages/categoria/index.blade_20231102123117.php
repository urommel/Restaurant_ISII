<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">Categorías</h1>
    
            <a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Crear Nueva Categoría</a>
    
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b">Nombre</th>
                        <th class="border-b">Tipo</th>
                        <th class="border-b">Descripción</th>
                        <th class="border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="border">{{ $categoria->nombre }}</td>
                            <td class="border">{{ $categoria->tipo }}</td>
                            <td class="border">{{ $categoria->descripcion }}</td>
                            <td class="border">
                                <a href="{{ route('categoria.show', $categoria->id) }}" class="text-blue-500">Ver</a>
                                <!-- Agrega enlaces para editar y eliminar según tus necesidades -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>