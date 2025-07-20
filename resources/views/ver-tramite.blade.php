<x-layouts.app :title="'Ver Trámite #' . $tramiteId">
    @livewire('ver-tramite', ['tramiteId' => $tramiteId])
</x-layouts.app>