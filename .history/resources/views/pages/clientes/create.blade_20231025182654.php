<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold my-4">Nuevo Cliente</h1>

            <form action="{{ route('clientes.store') }}" method="POST" class="w-full max-w-lg">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" name="name" id="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="client_type" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Cliente</label>
                    <select name="client_type" id="client_type"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                        <option value="RUC">RUC</option>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="identifier" class="block text-gray-700 text-sm font-bold mb-2">Identificador</label>
                    <input type="text" name="identifier" id="identifier"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Guardar</button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
