{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-semibold mb-4">Crear Nuevo Plato</h1>
    
            <form action="{{ route('platos.store') }}" method="post" enctype="multipart/form-data" class="max-w-md">
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
                    <label for="tipoPlato" class="block text-sm font-medium text-gray-600">Tipo de Plato:</label>
                    <input type="text" name="tipoPlato" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-600">Precio:</label>
                    <input type="number" name="precio" step="0.01" class="mt-1 p-2 w-full border rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-gray-600">Imagen:</label>
                    <input type="file" name="urlPlato" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Guardar Plato</button>
            </form>
        </div>
    </div>
</x-app-layout> --}}

