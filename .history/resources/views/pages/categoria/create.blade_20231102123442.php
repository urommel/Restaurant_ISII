<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">Crear Nueva Categoría</h1>
    
            <form action="{{ route('categorias.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-input mt-1 block w-full" required>
                </div>
    
                <div class="mb-4">
                    <label for="tipo" class="block text-gray-700">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select mt-1 block w-full" required>
                        <option value="bebida">Bebida</option>
                        <option value="plato">Plato</option>
                        <option value="materia prima">Materia Prima</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" class="form-textarea mt-1 block w-full"></textarea>
                </div>
    
                <div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Guardar</button>
                    <a href="{{ route('categorias.index') }}" class="ml-2 text-gray-600">Cancelar</a>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>