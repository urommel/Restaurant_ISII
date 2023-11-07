<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-2xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Crear Nuevo Producto</h1>

            <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="max-w-md">
                @csrf

                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre:</label>
                    <input type="text" name="nombre" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-600">Descripción:</label>
                    <textarea name="descripcion" class="mt-1 p-2 w-full border rounded-md" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="tipo_id" class="block text-sm font-medium text-gray-600">Tipo: </label>
                    <select name="tipo_id" class="mt-1 p-2 w-full border rounded-md" required>
                        @foreach($tipos as $tipos)
                            <option value="{{ $tipos->id }}">{{ $tipos->nombre }}</option>
                        @endforeach
                        <option value="nuevoTipo">Crear Nuevo Tipo</option>
                    </select>
                </div>
                
                <!-- Mostrar este campo solo si se selecciona "Crear Nuevo Tipo" -->
                <div class="mb-4" id="nuevoTipo" style="display: none;">
                    <label for="nuevo_tipo_plato" class="block text-sm font-medium text-gray-600">Nuevo Tipo de Plato:</label>
                    <input type="text" name="nuevo_tipo_plato" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-600">Precio:</label>
                    <input type="number" name="precio" step="0.01" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-600">Stock:</label>
                    <input type="number" name="stock" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                {{-- <div class="mb-4">
                    <label for="categoria" class="block text-sm font-medium text-gray-600">Categoría:</label>
                    <input type="text" name="categoria" class="mt-1 p-2 w-full border rounded-md" required>
                </div> --}}

                <div class="mb-4">
                    <label for="categoria_id" class="block text-sm font-medium text-gray-600">Categoría:</label>
                    <select name="categoria_id" class="mt-1 p-2 w-full border rounded-md" required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                        <option value="nueva">Crear Nueva Categoría</option>
                    </select>
                </div>
                
                <!-- Mostrar este campo solo si se selecciona "Crear Nueva Categoría" -->
                <div class="mb-4" id="nuevaCategoria" style="display: none;">
                    <label for="nueva_categoria" class="block text-sm font-medium text-gray-600">Nueva Categoría:</label>
                    <input type="text" name="nueva_categoria" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-gray-600">Imagen:</label>
                    <input type="file" name="urlPlato" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="disponible" class="block text-sm font-medium text-gray-600">Disponible:</label>
                    <select name="disponible" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar Plato</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoriaDropdown = document.querySelector('select[name="categoria_id"]');
        const nuevaCategoriaDiv = document.getElementById('nuevaCategoria');

        categoriaDropdown.addEventListener('change', function() {
            if (categoriaDropdown.value === 'nueva') {
                nuevaCategoriaDiv.style.display = 'block';
            } else {
                nuevaCategoriaDiv.style.display = 'none';
            }
        });

        const tipoPlatoDropdown = document.querySelector('select[name="tipo_id"]');
        const nuevoTipoPlatoDiv = document.getElementById('nuevoTipo');

        tipoPlatoDropdown.addEventListener('change', function() {
            if (tipoPlatoDropdown.value === 'nuevoTipo') {
                nuevoTipoPlatoDiv.style.display = 'block';
            } else {
                nuevoTipoPlatoDiv.style.display = 'none';
            }
        });
    });
</script>

