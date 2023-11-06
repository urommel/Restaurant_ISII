<x-app-layout>
    <h1 class="mb-4 text-2xl font-bold">Selecciona una Mesa</h1>

    <div class="grid grid-cols-4 gap-4">
        @foreach($mesas as $mesa)
            <a href="{{ route('orden.show', $mesa->id) }}" class="p-4 text-white bg-blue-500 rounded">
                Mesa {{ $mesa->numero }}
            </a>
        @endforeach
    </div>
</x-app-layout>
