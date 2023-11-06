<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Selecciona una Mesa</h1>

    <div class="grid grid-cols-4 gap-4">
        @foreach($mesas as $mesa)
            <a href="{{ route('ordenes.show', $mesa->id) }}" class="p-4 bg-blue-500 text-white rounded">
                Mesa {{ $mesa->numero }}
            </a>
        @endforeach
    </div>
</x-app-layout>
