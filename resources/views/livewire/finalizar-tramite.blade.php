<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Finalizar Trámite #{{ $tramite->id }}</h2>
    <p><strong>Documento:</strong> {{ $tramite->documento }}</p>
    <p><strong>Estado actual:</strong> {{ $tramite->estado }}</p>
    @if($tramite->estado === 'Aprobado')
        <div class="bg-yellow-100 text-yellow-800 p-3 rounded mb-4">
            ⚠️ ¿Está seguro de finalizar este trámite? Esta acción no se puede deshacer.
        </div>

        <button wire:click="finalizar"
                wire:confirm="¿Está seguro que desea finalizar este trámite?"
                class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            Confirmar Finalización
        </button>
    @else
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            Solo los trámites en estado <strong>Aprobado</strong> pueden ser finalizados.
        </div>
    @endif
    <a href="{{ route('panel.principal') }}"
            class="mt-4 inline-block bg-gray-300 text-black px-4 py-2 rounded shadow hover:bg-gray-400 transition duration-200">
        Cancelar y volver
    </a>
</div>
