<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Sección de Productos -->
            <div class="mb-8 md:col-span-2">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                {{-- <!-- Aquí iría el código para mostrar la lista de productos -->
                <!-- Puedes agregar botones o controles para seleccionar productos y cantidades -->
                <!-- También puedes agregar un botón de "Confirmar Pedido" -->
                <button class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-full">
                    Confirmar Pedido
                </button> --}}
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
                            {{-- <li class="mr-2">
                            <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Facts</button>
                        </li> --}}
                        </ul>
                        <div id="defaultTabContent">
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about"
                                role="tabpanel" aria-labelledby="about-tab">
                                @foreach ($platos as $plato)
                                    {{-- <div class="flex items-center justify-center space-x-4">
                                        <a href="#" class="flex-shrink-0">
                                            <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png"
                                                alt="product image" />
                                        </a>
                                        <div class="flex-grow">
                                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $plato->nombre }}
                                            </h5>
                                        </div>
                                        <span
                                            class="text-xl font-bold text-gray-900 dark:text-white">${{ $plato->precio }}</span>
                                        <div class="flex items-center">
                                            <input type="number" id="quantity_{{ $plato->id }}" min="1"
                                                value="1"
                                                class="w-16 px-2 py-1 ml-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                            <button
                                                onclick="agregarAlCarrito('{{ $plato->nombre }}', {{ $plato->precio }}, document.getElementById('quantity_{{ $plato->id }}').value)"
                                                class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir</button>
                                        </div>
                                    </div> --}}
                                    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                                        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="mr-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
                                            <div class="text-left">
                                                <div class="mb-1 text-xs">Download on the</div>
                                                <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
                                            </div>
                                        </a>
                                        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="mr-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
                                            <div class="text-left">
                                                <div class="mb-1 text-xs">Get in on</div>
                                                <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                @endforeach
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services"
                                role="tabpanel" aria-labelledby="services-tab">
                                @foreach ($bebidas as $bebida)
                                    <div class="flex items-center">
                                        <a href="#" class="flex-shrink-0">
                                            <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png"
                                                alt="product image" />
                                        </a>
                                        <a href="#" class="ml-4">
                                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $bebida->nombre }}
                                            </h5>
                                        </a>
                                        <span
                                            class="ml-4 text-xl font-bold text-gray-900 dark:text-white">${{ $bebida->precio }}</span>
                                        <input type="number" id="quantity_{{ $bebida->id }}" min="1"
                                            value="1"
                                            class="w-16 px-2 py-1 ml-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                        <button
                                            onclick="agregarAlCarrito('{{ $bebida->nombre }}', {{ $bebida->precio }}, document.getElementById('quantity_{{ $bebida->id }}').value)"
                                            class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir</button>
                                    </div>
                                @endforeach

                            </div>
                            {{-- <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
                            
                        </div> --}}
                        </div>
                    </div>

                    <div class="relative mt-8 overflow-x-auto border border-transparent shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Producto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cantidad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio unidad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio total de unidad
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                    </th>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4 text-right">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sección de Factura -->
            <div class="md:col-span-1 ">
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                {{-- <!-- Aquí iría el código para mostrar la factura -->
                <!-- Puedes incluir la mesa, cliente, mesero, monto a pagar, etc. -->
                <!-- Además, agrega campos para el monto que dio el cliente, el vuelto, y un botón para pagar -->
                <button class="px-4 py-2 mt-4 text-white bg-green-500 rounded-full">
                    Pagar
                </button> --}}

                <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
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



                        {{-- <button type="submit"
                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                        Orden</button> --}}
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

    // function crearOrden() {
    //     // Aquí puedes enviar la orden al servidor o realizar otras acciones necesarias
    //     // Reiniciar variables después de crear la orden
    //     carrito = [];
    //     total = 0;
    //     mesa = "";
    //     cliente = "";
    //     mesero = "";

    //     // Limpiar la lista en el carrito y actualizar detalles
    //     actualizarCarrito();
    //     actualizarDetalles();
    // }

    function crearOrden() {
        // Agrega aquí la lógica para enviar la orden al servidor
        // Puedes utilizar AJAX (por ejemplo, con Axios) o la API fetch de JavaScript

        // Ejemplo con fetch:
        fetch('/ordenes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegúrate de incluir el token CSRF si estás utilizando Laravel
                },
                body: JSON.stringify({
                    mesa: mesa,
                    cliente: cliente,
                    mesero: mesero,
                    observaciones: document.getElementById('obs').value,
                    productos: carrito
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta del servidor:', data);

                // Reiniciar variables después de crear la orden
                carrito = [];
                total = 0;
                mesa = "";
                cliente = "";
                mesero = "";

                // Limpiar la lista en el carrito y actualizar detalles
                actualizarCarrito();
                actualizarDetalles();

                // También puedes mostrar un mensaje de éxito o redirigir a otra página
                alert("La orden se ha guardado exitosamente.");
            })
            .catch(error => {
                console.error('Error al enviar la orden:', error);
                alert("Hubo un error al guardar la orden. Por favor, inténtalo de nuevo.");
            });
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
