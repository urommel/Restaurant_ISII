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
    {{-- <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

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
            <select name="plato_id" id="plato_id">
                @foreach ($platos as $plato)
                    <option value="{{ $plato->id }}">{{ $plato->nombre }} - ${{ $plato->precio }}</option>
                @endforeach
            </select>
            <button type="button" onclick="agregarAlCarrito('plato')">Agregar Plato</button>

            <label for="bebidas">Bebidas:</label>
            <select name="bebida_id" id="bebida_id">
                @foreach ($bebidas as $bebida)
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
    </script> --}}



    <div class="flex">
        <div class="w-8/12">
            <div class="card border shadow-none">
                <div class="card-body">

                    <div class="flex border-b pb-3">
                        <div class="me-4">
                            <img src="{{ URL::asset('./assets/images/product/img-1.png') }}" alt=""
                                class="avatar-lg">
                        </div>
                        <div class="flex-grow-1 self-center overflow-hidden">
                            <div>
                                <h5 class="truncate text-16"><a href="ecommerce-product-detail" class="text-dark">Nike
                                        N012 Running Shoes</a></h5>
                                <p class="mb-1">Color : <span class="font-medium">Gray</span></p>
                                <p>Size : <span class="font-medium">08</span></p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline text-16 mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-heart-outline"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Price</p>
                                    <h5 class="text-16">$260</h5>
                                </div>
                            </div>
                            <div>
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Quantity</p>
                                    <div class="inline-flex">
                                        <select class="form-select form-select-sm w-48">
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Total</p>
                                    <h5 class="text-16">$520</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <!-- Repeat the above structure for the other cards -->

            <div class="mt-4">
                <div class="flex">
                    <div class="w-6/12">
                        <a href="ecommerce-products" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping
                        </a>
                    </div>
                    <div class="w-6/12 text-right">
                        <div class="mt-2">
                            <a href="ecommerce-checkout" class="btn btn-success">
                                <i class="mdi mdi-cart-outline me-1"></i> Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4/12 mt-5 lg:mt-0">
            <div class="card border shadow-none">
                <div class="card-header bg-transparent border-b py-3 px-4">
                    <h5 class="text-16 mb-0">Order Summary <span class="float-right">#MN0124</span></h5>
                </div>
                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td class="text-right">$ 780</td>
                                </tr>
                                <tr>
                                    <td>Discount :</td>
                                    <td class="text-right">- $ 78</td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td class="text-right">$ 25</td>
                                </tr>
                                <tr>
                                    <td>Estimated Tax :</td>
                                    <td class="text-right">$ 18.20</td>
                                </tr>
                                <tr class="bg-light">
                                    <th>Total :</th>
                                    <td class="text-right">
                                        <span class="font-bold">
                                            $ 745.2
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-12 gap-6">



    </div>







</x-app-layout>
