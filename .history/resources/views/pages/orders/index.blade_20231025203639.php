<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <!-- Aquí va tu código HTML y Tailwind CSS según tus necesidades -->
        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf

            <label for="table">Selecciona la mesa:</label>
            <select name="table" id="table">
                @foreach ($mesas as $mesa)
                    <option value="{{ $mesa->id }}">{{ $mesa->numero_mesa }}</option>
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




        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                
                
            </div>
            <div class="flex flex-col items-center pb-10">
                @foreach ($mesas as $mesa)
                    
                @endforeach
                
            </div>
        </div>


    </div>
</x-app-layout>
