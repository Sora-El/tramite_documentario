<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Atender Trámite #{{ $tramite->id }}</h2>
    <p><strong>Documento:</strong> {{ $tramite->documento }}</p>
    <p><strong>Estado actual:</strong> {{ $tramite->estado }}</p>

    <button wire:click="aprobarTramite"
            wire:loading.attr="disabled"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded shadow transition-transform duration-300 hover:scale-105 hover:bg-green-600 active:scale-95">
        <span wire:loading.remove>
            ✅ Aprobar este trámite
        </span>
        <span wire:loading>
            ⏳ Procesando...
        </span>
    </button>

    <a href="{{ route('panel.principal') }}"
            class="mt-4 ml-2 inline-block bg-gray-300 text-black px-4 py-2 rounded shadow hover:bg-gray-400 transition duration-200">
        Cancelar y volver
    </a>
</div>
