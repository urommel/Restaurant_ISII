{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf
            <input type="hidden" name="mesas_id" value="{{ $mesas->id }}">
        
            <label for="client_id">Selecciona el cliente:</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        
            <label for="platos">Platos:</label>
            <select name="platos[]" id="platos" multiple>
                @foreach ($platos as $plato)
                    <option value="{{ $plato->id }}">{{ $plato->nombre }}</option>
                @endforeach
            </select>
        
            <label for="bebidas">Bebidas:</label>
            <select name="bebidas[]" id="bebidas" multiple>
                @foreach ($bebidas as $bebida)
                    <option value="{{ $bebida->id }}">{{ $bebida->nombre }}</option>
                @endforeach
            </select>
        
            <!-- Otros campos para detalles de la orden, como cantidad, observaciones, etc. -->
        
            <button type="submit">Crear Orden</button>
        </form>
    </div>
</x-app-layout> --}}

<x-app-layout>
    



    ----------------------------------

    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="flex">
            <!-- Contenido de la izquierda (platos y bebidas) -->
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <!-- ... (Código de pestañas y contenido) ... -->
                    
                
            </div>

            <!-- Contenido de la derecha (resumen del pedido) -->
            <div class="w-4/12 mt-5 lg:mt-0">
                <div class="card border shadow-none">
                    <div class="card-header bg-transparent border-b py-3 px-4">
                        <h5 class="text-16 mb-0">Mesa: <span class="float-right">#</span></h5>
                    </div>
                    <div class="card-header bg-transparent border-b py-3 px-4">
                        <h5 class="text-16 mb-0">Cliente: <span class="float-right">#</span></h5>
                    </div>
                    <div class="card-header bg-transparent border-b py-3 px-4">
                        <h5 class="text-16 mb-0">Mesero: <span class="float-right">#</span></h5>
                    </div>
                    <div class="card-body p-4">
                        <!-- Carrito de compras -->
                        <div id="carrito">
                            <h2 class="mb-4 text-2xl font-semibold">Carrito de compras</h2>
                            <ul id="items" class="mb-4"></ul>
                            <p class="mb-4">Total: $<span id="total">0</span></p>
                        </div>

                        <!-- Detalles de la orden -->
                        <label for="obs">Observaciones:</label>
                        <textarea name="obs" id="obs" rows="3" class="w-full border p-2 mb-4"></textarea>

                        <!-- Tabla de productos -->
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Product name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Quantity
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Total
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Puedes agregar dinámicamente los elementos del pedido aquí -->
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Apple MacBook Pro 17"
                                        </td>
                                        <td class="px-6 py-4">
                                            1
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4">
                                            <button class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Remove</button>
                                        </td>
                                    </tr>
                                    <!-- Repite este bloque para cada producto en el carrito -->
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->

                        <button type="submit" class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Orden</button>
                    </div>
                </div>
            </div>
        </div>
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



    

