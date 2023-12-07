<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">{{ __('Proveedor') }}</h2>
                <a href="{{ route('proveedors.create') }}" class="btn btn-primary">Create New</a>
            </div>
    
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
    
            <div class="overflow-x-auto">
                <table class="table-auto min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Compañia</th>
                            <th class="px-4 py-2">Representante</th>
                            <th class="px-4 py-2">Ruc</th>
                            <th class="px-4 py-2">Celular</th>
                            <th class="px-4 py-2">Direccion</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedors as $proveedor)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->compañia }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->representante }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->ruc }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->celular }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->direccion }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->email }}</td>
                                <td class="border px-4 py-2">{{ $proveedor->estado }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('proveedors.destroy', $proveedor->idProveedor) }}" method="POST">
                                        <a href="{{ route('proveedors.show', $proveedor->idProveedor) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('proveedors.edit', $proveedor->idProveedor) }}" class="btn btn-success">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            {!! $proveedors->links() !!}
        </div>

    </div>
</x-app-layout>
