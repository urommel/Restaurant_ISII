<x-app-layout>

    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="flex">
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Seleccionar Producto</label>
                    <select id="tabs"
                        class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Platos</option>
                        <option>Bebidas</option>
                        <option>Órdenes</option>
                    </select>
                </div>
                <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400"
                    id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab"
                            aria-controls="stats" aria-selected="true"
                            class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Platos</button>
                    </li>
                    <li class="w-full">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                            aria-controls="about" aria-selected="false"
                            class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Bebidas</button>
                    </li>
                    <li class="w-full">
                        <button id="orders-tab" data-tabs-target="#orders" type="button" role="tab"
                            aria-controls="orders" aria-selected="false"
                            class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Órdenes</button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    <!-- Contenido de Platos -->
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel"
                        aria-labelledby="stats-tab">
                        @foreach ($platos as $plato)
                            <div class="flex items-center">
                                <a href="#" class="flex-shrink-0">
                                    <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png"
                                        alt="product image" />
                                </a>
                                <div class="flex-grow px-4">
                                    <a href="#">
                                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $plato->nombre }}
                                        </h5>
                                    </a>
                                    <p class="text-gray-500 dark:text-gray-400">Descripción del plato...</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span
                                            class="text-xl font-bold text-gray-900 dark:text-white">${{ $plato->precio }}</span>
                                        <input type="number" id="quantity_{{ $plato->id }}" min="1"
                                            value="1">
                                        <button
                                            onclick="agregarAlCarrito('{{ $plato->nombre }}', {{ $plato->precio }}, document.getElementById('quantity_{{ $plato->id }}').value)"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Contenido de Bebidas -->
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        @foreach ($bebidas as $bebida)
                            <div class="flex items-center">
                                <a href="#" class="flex-shrink-0">
                                    <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png"
                                        alt="product image" />
                                </a>
                                <div class="flex-grow px-4">
                                    <a href="#">
                                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $bebida->nombre }}
                                        </h5>
                                    </a>
                                    <p class="text-gray-500 dark:text-gray-400">Descripción del plato...</p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span
                                            class="text-xl font-bold text-gray-900 dark:text-white">${{ $bebida->precio }}</span>
                                        <button
                                            onclick="agregarAlCarrito('{{ $bebida->nombre }}', {{ $bebida->precio }})"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Contenido de Órdenes -->
                    <div class="hidden p-4 mt-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="orders"
                        role="tabpanel" aria-labelledby="orders-tab">
                        <h2 class="mb-4 text-2xl font-semibold">Productos en el Carrito</h2>

                        <!-- Tabla de productos en el carrito -->
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3">Producto</th>
                                        <th class="px-6 py-3">Cantidad</th>
                                        <th class="px-6 py-3">Precio Unitario</th>
                                        <th class="px-6 py-3">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="productosEnCarrito">
                                    <!-- Los productos seleccionados se agregarán dinámicamente aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Contenido de la derecha (resumen del pedido) -->
            <div class="w-4/12 mt-5 lg:mt-0">
                <div class="border shadow-none card">
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <h5 class="mb-0 text-16">Mesa: <span class="float-right">0{{ $mesas->numero_mesa }}</span></h5>
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
                        <h5 class="mb-0 text-16">Mesero: <span class="float-right"> </span></h5>
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



                        <button type="submit"
                            class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                            Orden</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden p-4 mt-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="orders" role="tabpanel"
            aria-labelledby="orders-tab">
            <h2 class="mb-4 text-2xl font-semibold">Productos en el Carrito</h2>

            <!-- Tabla de productos en el carrito -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th class="px-6 py-3">Producto</th>
                            <th class="px-6 py-3">Cantidad</th>
                            <th class="px-6 py-3">Precio Unitario</th>
                            <th class="px-6 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody id="productosEnCarrito">
                        <!-- Los productos seleccionados se agregarán dinámicamente aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let carrito = [];
        let total = 0;
        let mesa = ""; // Variable para almacenar el número de mesa
        let cliente = ""; // Variable para almacenar el nombre del cliente
        let mesero = ""; // Variable para almacenar el nombre del mesero

        function agregarAlCarrito(tipo, nombre, precio) {
            let item = {
                tipo: tipo,
                nombre: nombre,
                precio: precio
            };
            carrito.push(item);
            total += precio;

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

        function actualizarDetalles() {
            // Actualizar detalles de la orden
            document.getElementById('mesa').textContent = "Mesa: " + mesa;
            document.getElementById('cliente').textContent = "Cliente: " + cliente;
            document.getElementById('mesero').textContent = "Mesero: " + mesero;
        }

        function crearOrden() {
            // Aquí puedes enviar la orden al servidor o realizar otras acciones necesarias
            // Reiniciar variables después de crear la orden
            carrito = [];
            total = 0;
            mesa = "";
            cliente = "";
            mesero = "";

            // Limpiar la lista en el carrito y actualizar detalles
            actualizarCarrito();
            actualizarDetalles();
        }

        function toggleCustomerSelect() {
            var checkBox = document.getElementById("general_customer");
            var select = document.getElementById("client_id");

            // Si el checkbox está marcado, deshabilita el select
            if (checkBox.checked == true) {
                select.disabled = true;
            } else {
                select.disabled = false;
            }
        }

        // Función para agregar productos al carrito (debes implementarla según tu lógica)
        function agregarAlCarrito(nombre, precio, cantidad) {
            // Intenta imprimir en la consola para verificar si se llama correctamente
            // console.log("Agregando al carrito:", nombre, precio, cantidad);

            // Luego, actualiza dinámicamente la tabla de productos en el carrito
            var total = precio * cantidad;

            // Crea una fila para la tabla con los detalles del producto
            var fila = "<tr><td>" + nombre + "</td><td>" + cantidad + "</td><td>" + precio + "</td><td>" + total +
                "</td></tr>";

            // Agrega la fila a la tabla
            document.getElementById("productosEnCarrito").innerHTML += fila;
        }
    </script>


</x-app-layout>
