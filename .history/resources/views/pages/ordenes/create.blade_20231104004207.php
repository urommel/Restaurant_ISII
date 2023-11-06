<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Sección de Productos -->
            <div class="mb-8 md:col-span-2">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <div class="divide-y-2">
                    <div
                        class="w-full mb-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <li class="mr-2">
                                <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                    aria-controls="about" aria-selected="true"
                                    class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Platos</button>
                            </li>
                            <li class="mr-2">
                                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                                    aria-controls="services" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Bebidas</button>
                            </li>
                        </ul>
                        <div id="defaultTabContent">
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about"
                                role="tabpanel" aria-labelledby="about-tab">
                                <div class="grid grid-cols-4 gap-4" style="max-height: 400px; overflow-y: scroll;">
                                    @foreach ($platos as $index => $plato)
                                        <div
                                            class="flex flex-col justify-between border border-gray-200 rounded-lg shadow plato-container bg-red-50">
                                            <div class="px-4 py-3">
                                                <a href="#">
                                                    <h5 class="text-lg font-semibold text-gray-900">{{ $plato->nombre }}
                                                    </h5>
                                                </a>
                                            </div>
                                            <div class="flex justify-center">
                                                <a href="#">
                                                    <img class="object-cover w-32 h-32 p-4 rounded-lg"
                                                        src="/docs/images/products/apple-watch.png"
                                                        alt="product image" />
                                                </a>
                                            </div>
                                            <div class="px-4 py-3 mt-auto">
                                                <span
                                                    class="text-xl font-bold text-gray-900">${{ $plato->precio }}</span>
                                            </div>
                                            <div class="px-4 py-3">
                                                <button
                                                    onclick="addToCart('{{ $plato->nombre }}', {{ $plato->precio }})"
                                                    class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar
                                                    al carrito</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services"
                                role="tabpanel" aria-labelledby="services-tab">
                                <div class="grid grid-cols-4 gap-4" style="max-height: 400px; overflow-y: scroll;">
                                    @foreach ($bebidas as $index => $bebida)
                                        <div
                                            class="flex flex-col justify-between border border-gray-200 rounded-lg shadow bebida-container bg-green-50">
                                            <div class="px-4 py-3">
                                                <a href="#">
                                                    <h5 class="text-lg font-semibold text-gray-900">
                                                        {{ $bebida->nombre }}</h5>
                                                </a>
                                            </div>
                                            <div class="flex justify-center">
                                                <a href="#">
                                                    <img class="object-cover w-32 h-32 p-4 rounded-lg"
                                                        src="/docs/images/products/beverage.png" alt="product image" />
                                                </a>
                                            </div>
                                            <div class="px-4 py-3 mt-auto">
                                                <span
                                                    class="text-xl font-bold text-gray-900">${{ $bebida->precio }}</span>
                                            </div>
                                            <div class="px-4 py-3">
                                                <button
                                                    onclick="addToCart('{{ $bebida->nombre }}', {{ $bebida->precio }})"
                                                    class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar
                                                    al carrito</button>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative mt-8 overflow-x-auto border border-transparent shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3"></th>
                                    <th scope="col" class="px-6 py-3">Producto</th>
                                    <th scope="col" class="px-6 py-3">Cantidad</th>
                                    <th scope="col" class="px-6 py-3">Precio unidad</th>
                                    <th scope="col" class="px-6 py-3">Precio total de unidad</th>
                                </tr>
                            </thead>
                            <tbody id="tablaProductosBody">
                                <!-- Aquí se añadirán las filas de productos seleccionados -->
                            </tbody>
                        </table>
                        
                </div>
            </div>

            <!-- Sección de Factura -->
            <div class="md:col-span-1 ">
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <h5 class="mb-0 text-16">Mesa: <span class="float-right">0{{ $mesas->numero_mesa }}</span>
                        </h5>
                    </div>
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <label for="client_id">Selecciona el cliente:</label>
                        <select name="client_id" id="client_id" disabled>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>

                        <input type="checkbox" id="general_customer" name="general_customer"
                            onchange="toggleCustomerSelect()" checked>
                        <label for="general_customer">Cliente general</label>
                    </div>
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <h5 class="mb-0 text-16">Mesero: <span class="float-right"> {{ Auth::user()->name }}</span>
                        </h5>
                    </div>
                    <div class="p-4 card-body">
                        <!-- Carrito de compras -->
                        <div id="carrito">
                            <h2 class="mb-4 text-2xl font-semibold">Carrito de compras</h2>
                            <p class="mb-4">Total: $<span id="total">0</span></p>
                        </div>

                        <!-- Detalles de la orden -->
                        <label for="obs">Observaciones:</label>
                        <textarea name="obs" id="obs" rows="3" class="w-full p-2 mb-4 border"></textarea>
                        <button type="button" onclick="crearOrden()"
                            class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Crear Orden
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    let montoTotal = 0;

    function addToCart(nombre, precio) {
        // Obtener la referencia a la tabla de productos
        const tablaProductos = document.getElementById('tablaProductosBody');

        // Crear una nueva fila
        const fila = document.createElement('tr');

        // Crear las celdas de la fila
        const celdaEliminar = document.createElement('td');
        const celdaProducto = document.createElement('td');
        const celdaCantidad = document.createElement('td');
        const celdaPrecioUnidad = document.createElement('td');
        const celdaPrecioTotal = document.createElement('td');

        // Agregar contenido a las celdas
        celdaEliminar.innerHTML =
            '<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>';
        celdaProducto.textContent = nombre;

        // Crear el campo de entrada de cantidad
        const inputCantidad = document.createElement('input');
        inputCantidad.type = 'number';
        inputCantidad.id = `quantity_${nombre.replace(/\s+/g, '_')}`;
        inputCantidad.min = '1';
        inputCantidad.value = '1';
        inputCantidad.classList.add('w-16', 'px-2', 'py-1', 'ml-4', 'text-sm', 'text-gray-900', 'bg-white', 'border',
            'border-gray-300', 'rounded-lg', 'dark:bg-gray-800', 'dark:border-gray-700', 'dark:text-gray-400');

        // Agregar un evento para actualizar el precio total al cambiar la cantidad
        inputCantidad.addEventListener('input', function() {
            const cantidad = parseInt(inputCantidad.value);
            const precioTotal = (cantidad * precio).toFixed(2);
            celdaPrecioTotal.textContent = `$${precioTotal}`;

            // Actualizar el monto total
            updateMontoTotal();
        });

        celdaCantidad.appendChild(inputCantidad);
        celdaPrecioUnidad.textContent = `$${precio}`;
        celdaPrecioTotal.textContent = `$${precio.toFixed(2)}`;

        // Agregar las celdas a la fila
        fila.appendChild(celdaEliminar);
        fila.appendChild(celdaProducto);
        fila.appendChild(celdaCantidad);
        fila.appendChild(celdaPrecioUnidad);
        fila.appendChild(celdaPrecioTotal);

        // Agregar la fila a la tabla
        tablaProductos.appendChild(fila);

        // Actualizar el monto total
        montoTotal += precio;
        updateMontoTotal();
    }

    function updateMontoTotal() {
        const montoTotalElement = document.getElementById('montoTotal');
        montoTotalElement.textContent = `$${montoTotal.toFixed(2)}`;

        const montoTotalContainer = document.getElementById('montoTotalContainer');
        const montoTotalLabel = document.getElementById('montoTotalLabel');
        montoTotalContainer.style.display = montoTotal > 0 ? 'block' : 'none';
        montoTotalLabel.style.display = montoTotal > 0 ? 'inline' : 'none';
    }
</script>
