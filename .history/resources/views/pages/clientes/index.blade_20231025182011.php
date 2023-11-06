<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold my-4">Lista de Clientes</h1>

            <a href="{{ route('clientes.create') }}" class="bg-blue-500 text-white py-2 px-4 mb-4 rounded">Nuevo
                Cliente</a>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Tipo de Cliente</th>
                        <th class="border px-4 py-2">Identificador</th>
                        <th class="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td class="border px-4 py-2">{{ $client->id }}</td>
                            <td class="border px-4 py-2">{{ $client->name }}</td>
                            <td class="border px-4 py-2">{{ $client->email }}</td>
                            <td class="border px-4 py-2">{{ $client->client_type }}</td>
                            <td class="border px-4 py-2">{{ $client->identifier }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('clientes.edit', $client->id) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('clientes.destroy', $client->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 ml-2"')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
