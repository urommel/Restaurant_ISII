{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Crear Nueva Bebida</h1>

            <form action="{{ route('bebidas.store') }}" method="post" enctype="multipart/form-data" class="max-w-md">
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
                    <label for="tipoBebida" class="block text-sm font-medium text-gray-600">Tipo de Bebida:</label>
                    <input type="text" name="tipoBebida" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-600">Precio:</label>
                    <input type="number" name="precio" step="0.01" class="mt-1 p-2 w-full border rounded-md"
                        required>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-gray-600">Imagen:</label>
                    <input type="file" name="urlBebida" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar Bebida</button>
            </form>
        </div>

    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-2xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Crear Nueva Bebida</h1>

            <form action="{{ route('bebidas.store') }}" method="post" enctype="multipart/form-data" class="max-w-md">
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
                    <label for="tipoBebida" class="block text-sm font-medium text-gray-600">Tipo de Bebida:</label>
                    <input type="text" name="tipoBebida" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-600">Precio:</label>
                    <input type="number" name="precio" step="0.01" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-600">Stock:</label>
                    <input type="number" name="stock" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="categoria" class="block text-sm font-medium text-gray-600">Categoría:</label>
                    <input type="text" name="categoria" class="mt-1 p-2 w-full border rounded-md" required>
                </div>

                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-gray-600">Imagen:</label>
                    <input type="file" name="urlBebida" class="mt-1 p-2 w-full border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="disponible" class="block text-sm font-medium text-gray-600">Disponible:</label>
                    <select name="disponible" class="mt-1 p-2 w-full border rounded-md" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar Bebida</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

