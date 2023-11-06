<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <!-- Aquí va tu código HTML y Tailwind CSS según tus necesidades -->
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <label for="table">Selecciona la mesa:</label>
            <select name="table" id="table">
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->name }}</option>
                @endforeach
            </select>

            <label for="client">Selecciona el cliente:</label>
            <select name="client" id="client">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->email }})</option>
                @endforeach
            </select>

            <!-- Aquí puedes añadir más campos para los platos y bebidas -->

            <button type="submit">Crear Comanda</button>
        </form>


    </div>
</x-app-layout>
