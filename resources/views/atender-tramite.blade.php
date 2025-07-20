<x-layouts.app :title="'Atender Trámite #' . $tramiteId">
    @livewire('atender-tramite', ['tramiteId' => $tramiteId])
</x-layouts.app>