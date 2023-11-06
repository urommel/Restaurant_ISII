<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Create New Proveedor</h2>
                <a href="{{ route('proveedors.index') }}" class="btn bg-blue-500 text-white hover:bg-blue-700">Back</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Please check your input and try again.
                </div>
            @endif

            <form action="{{ route('proveedors.store') }}" method="POST" class="max-w-lg">
                @csrf

                <div class="mb-4">
                    <label for="compañia" class="block text-sm font-medium text-gray-600">Compañia:</label>
                    <input type="text" name="compañia" id="compañia"
                        class="form-input mt-1 block w-full rounded-md shadow-sm" placeholder="Compañia" />
                </div>

                <div class="mb-4">
                    <label for="representante" class="block text-sm font-medium text-gray-600">Representante:</label>
                    <input type="text" name="representante" id="representante"
                        class="form-input mt-1 block w-full rounded-md shadow-sm" placeholder="Representante" />
                </div>

                <div class="mb-4">
                    <label for="ruc" class="block text-sm font-medium text-gray-600">Ruc:</label>
                    <input type="text" name="ruc" id="ruc"
                        class="form-input mt-1 block w-full rounded-md shadow-sm" placeholder="Ruc" />
                </div>

                <div class="mb-4">
                    <label for="celular" class="block text-sm font-medium text-gray-600">Celular:</label>
                    <input type="text" name="celular" id="celular"
                        class="form-input mt-1 block w-full rounded-md shadow-sm" placeholder="Celular" />
                </div>

                <div class="mb-4">
                    <label for="direccion" class="block text-sm font-medium text-gray-600">Direccion:</label>
                    <input type="text" name="direccion" id="direccion"
                        class="form-input mt-1 block w-full rounded-md shadow-sm" placeholder="Direccion" />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                    <input type="text" name="email" id="email"
                        class="form-input mt-1 block w-full rounded-md shadow-sm" placeholder="Email" />
                </div>

                <div class="mb-4">
                    <label for="estado" class="block text-sm font-medium text-gray-600">Estado:</label>
                    <select name="estado" id="estado" class="form-select mt-1 block w-full rounded-md shadow-sm">
                        <option value="pagada">Pagada</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="aprobada">Aprobada</option>
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn bg-green-500 text-white hover:bg-green-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
