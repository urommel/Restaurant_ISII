<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h2 class="text-2xl font-bold mb-4">Lista de Mesas</h2>
            <a href="{{ route('mesas.create') }}" class="bg-blue-500 text-white p-2 rounded-md mb-4">Crear Nueva Mesa</a>
            @if (count($mesas) > 0)
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border bg-gray-100 px-4 py-2">Número de Mesa</th>
                            <th class="border bg-gray-100 px-4 py-2">Estado</th>
                            <th class="border bg-gray-100 px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mesas as $mesa)
                            <tr>
                                <td class="border px-4 py-2">{{ $mesa->numero_mesa }}</td>
                                <td class="border px-4 py-2">{{ $mesa->estado }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('mesas.edit', $mesa->id) }}" class="text-blue-500">Editar</a>
                                    <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay mesas registradas.</p>
            @endif
        </div>
</x-app-layout>
