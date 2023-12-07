{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf
            <input type="hidden" name="mesas_id" value="{{ $mesas->id }}">
        
            <label for="client_id">Selecciona el cliente:</label>
            <select name="client_id" id="client_id">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        
            <label for="platos">Platos:</label>
            <select name="platos[]" id="platos" multiple>
                @foreach($platos as $plato)
                    <option value="{{ $plato->id }}">{{ $plato->nombre }}</option>
                @endforeach
            </select>
        
            <label for="bebidas">Bebidas:</label>
            <select name="bebidas[]" id="bebidas" multiple>
                @foreach($bebidas as $bebida)
                    <option value="{{ $bebida->id }}">{{ $bebida->nombre }}</option>
                @endforeach
            </select>
        
            <!-- Otros campos para detalles de la orden, como cantidad, observaciones, etc. -->
        
            <button type="submit">Crear Orden</button>
        </form>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf
            <input type="hidden" name="mesas_id" value="{{ $mesas->id }}">
        
            <label for="client_id">Selecciona el cliente:</label>
            <select name="client_id" id="client_id">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>

            <label for="platos">Platos:</label>
            <select name="plato_id" id="plato_id">
                @foreach($platos as $plato)
                    <option value="{{ $plato->id }}">{{ $plato->nombre }} - ${{ $plato->precio }}</option>
                @endforeach
            </select>
            <button type="button" onclick="agregarAlCarrito('plato')">Agregar Plato</button>

            <label for="bebidas">Bebidas:</label>
            <select name="bebida_id" id="bebida_id">
                @foreach($bebidas as $bebida)
                    <option value="{{ $bebida->id }}">{{ $bebida->nombre }} - ${{ $bebida->precio }}</option>
                @endforeach
            </select>
            <button type="button" onclick="agregarAlCarrito('bebida')">Agregar Bebida</button>
        
            <!-- Carrito de compras -->
            <div id="carrito">
                <h2>Carrito de compras</h2>
                <ul id="items"></ul>
                <p>Total: $<span id="total">0</span></p>
            </div>
        
            <!-- Otros campos para detalles de la orden, como cantidad, observaciones, etc. -->
        
            <button type="submit">Crear Orden</button>
        </form>
    </div>

    <script>
        let carrito = [];
        let total = 0;

        function agregarAlCarrito(tipo) {
            let select = document.getElementById(tipo + '_id');
            let selectedItem = select.options[select.selectedIndex];
            let item = {
                id: selectedItem.value,
                nombre: selectedItem.text,
                precio: parseFloat(selectedItem.text.split('- $')[1])
            };
            carrito.push(item);
            total += item.precio;

            // Actualizar la lista en el carrito
            actualizarCarrito();
        }

        function actualizarCarrito() {
            let itemsList = document.getElementById('items');
            let totalElement = document.getElementById('total');
            
            // Limpiar la lista actual
            itemsList.innerHTML = '';

            // Actualizar la lista con los elementos del carrito
            carrito.forEach(item => {
                let listItem = document.createElement('li');
                listItem.textContent = item.nombre;
                itemsList.appendChild(listItem);
            });

            // Actualizar el total
            totalElement.textContent = total.toFixed(2);
        }
    </script>






</x-app-layout>



