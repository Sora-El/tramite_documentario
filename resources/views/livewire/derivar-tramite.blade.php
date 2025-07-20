<div class="p-4 space-y-4">

    <h2 class="text-xl font-bold">Derivar Trámite #{{ $tramite->id }}</h2>

    <div class="bg-white p-4 rounded shadow space-y-2">
        <p><strong>Documento:</strong> {{ $tramite->documento }}</p>
        <p><strong>Estado actual:</strong> {{ $tramite->estado }}</p>

        {{-- Selección del nuevo destinatario --}}
        <div class="mt-4">
            <label class="font-semibold block mb-1">Seleccionar destinatario:</label>
            <select wire:model="destinatarioId" class="w-full border rounded px-3 py-2">
                <option value="">-- Selecciona un usuario --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">
                        {{ $usuario->name }} {{ $usuario->last_name }} ({{ $usuario->email }})
                    </option>
                @endforeach
            </select>

            @error('destinatarioId')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botón para derivar --}}
        <button wire:click="derivarTramite"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Confirmar derivación
        </button>

        {{-- Cancelar --}}
        <a href="{{ route('panel.principal') }}"
                class="inline-block mt-2 bg-gray-300 text-black px-4 py-2 rounded">
            Cancelar y volver
        </a>

        {{-- Mensaje de éxito o error --}}
        @if (session()->has('success'))
            <p class="text-green-600 mt-2">{{ session('success') }}</p>
        @endif

        @if (session()->has('error'))
            <p class="text-red-600 mt-2">{{ session('error') }}</p>
        @endif
    </div>

</div>
