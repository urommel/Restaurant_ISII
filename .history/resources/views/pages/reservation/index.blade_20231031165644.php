<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Reservaciones</h1>

        <a href="{{ route('reservation.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4">Nueva Reserva</a>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Mesa</th>
                    <th class="py-2 px-4 border-b">Cliente</th>
                    <th class="py-2 px-4 border-b">Fecha y Hora</th>
                    <th class="py-2 px-4 border-b">Notas</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <!-- Agrega más columnas según necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $reservation->mesa->numero_mesa }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->client->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->reservation_datetime }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->notes }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->status }}</td>
                        <!-- Agrega más celdas según necesidades -->
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
