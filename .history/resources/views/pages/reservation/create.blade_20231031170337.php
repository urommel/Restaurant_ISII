<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="text-2xl font-bold mb-4">Crear Reserva</h1>

        <form action="{{ route('reservations.store') }}" method="POST" class="max-w-md">
            @csrf

            <input type="hidden" name="status" value="pending">

            <label for="mesa_id" class="block mb-2">Mesa:</label>
            <select name="mesa_id" id="mesa_id" class="w-full p-2 border rounded">
                @foreach ($mesas as $mesa)
                    <option value="{{ $mesa->id }}">{{ $mesa->numero_mesa }}</option>
                @endforeach
            </select>

            <label for="client_id" class="block mt-4 mb-2">Cliente:</label>
            <select name="client_id" id="client_id" class="w-full p-2 border rounded">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>

            <label for="reservation_datetime" class="block mt-4 mb-2">Fecha y Hora:</label>
            <input type="datetime-local" name="reservation_datetime" id="reservation_datetime"
                class="w-full p-2 border rounded">

            <label for="notes" class="block mt-4 mb-2">Notas:</label>
            <textarea name="notes" id="notes" class="w-full p-2 border rounded"></textarea>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded">Crear Reserva</button>
        </form>

    </div>
</x-app-layout>
