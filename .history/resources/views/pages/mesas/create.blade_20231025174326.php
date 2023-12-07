<x-app-layout>
    {{-- <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h2 class="text-2xl font-bold mb-4">Crear Nueva Mesa</h2>
            <form action="{{ route('mesas.store') }}" method="POST" class="max-w-md">
                @csrf
                <div class="mb-4">
                    <label for="numero_mesa" class="block text-gray-700 text-sm font-bold mb-2">Número de Mesa</label>
                    <input type="text" name="numero_mesa" id="numero_mesa" class="border rounded w-full py-2 px-3"
                        required>
                </div>
                <div class="mb-4">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                    <select name="estado" id="estado" class="border rounded w-full py-2 px-3" required>
                        <option value="libre">Libre</option>
                        <option value="ocupada">Ocupada</option>
                        <option value="reservada">Reservada</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Crear Mesa</button>
            </form>
        </div>
    </div> --}}

    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold mb-4">Crear Nuevas Mesas</h2>
        <form action="{{ route('mesas.storeMultiple') }}" method="POST" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="numero_mesas" class="block text-gray-700 text-sm font-bold mb-2">Número de Mesas</label>
                <input type="number" name="numero_mesas" id="numero_mesas" class="border rounded w-full py-2 px-3" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Crear Mesas</button>
        </form>
    </div>
</x-app-layout>
