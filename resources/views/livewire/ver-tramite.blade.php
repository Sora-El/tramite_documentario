<div class="space-y-6">

    {{-- Título --}}
    <div class="p-4 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Detalle del Trámite</h2>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p><strong>Documento:</strong> {{ $tramite->documento }}</p>
                <p><strong>Solicitante:</strong> {{ $tramite->solicitante }}</p>
                <p><strong>Código:</strong> {{ $tramite->codigo }}</p>
                <p><strong>Estado:</strong> {{ $tramite->estado }}</p>
                <p><strong>Fecha de Inicio:</strong> {{ $tramite->fecha_inicio }}</p>
            </div>
            <div>
                @if($tramite->archivo_adjunto)
                    <p><strong>Archivo Adjunto:</strong></p>
                    <a href="{{ asset('storage/' . $tramite->archivo_adjunto) }}" target="_blank" class="text-blue-600 underline">
                        Ver Archivo
                    </a>
                @else
                    <p><strong>Archivo Adjunto:</strong> No disponible.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Descripción y observaciones --}}
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-semibold mb-2">Descripción del Trámite:</h3>
        <p>{{ $tramite->descripcion ?? 'No registrada.' }}</p>

        <h3 class="font-semibold mt-4 mb-2">Observaciones:</h3>
        <p>{{ $tramite->observaciones ?? 'No registradas.' }}</p>
    </div>

    {{-- Formulario para agregar observaciones --}}
    <div class="bg-white rounded shadow p-4">
        <h3 class="font-semibold mb-2">Registrar Nueva Observación:</h3>

        <form wire:submit.prevent="guardarObservacion" class="space-y-4">
            <textarea wire:model.defer="nuevaObservacion" rows="4" class="w-full border rounded p-2" placeholder="Escribe una observación..."></textarea>

            <button type="submit" class="bg-blue-600 text-white rounded px-4 py-2">
                Guardar Observación
            </button>
        </form>
    </div>

    {{-- Botón volver --}}
    <div class="p-4">
        <a href="{{ route('panel.principal') }}" class="bg-gray-600 text-white px-4 py-2 rounded">
            ← Volver al panel
        </a>
    </div>

</div>
