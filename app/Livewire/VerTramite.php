<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tramite;

class VerTramite extends Component
{
    public $tramiteId;
    public $tramite;

    public $nuevaObservacion = '';   // Nueva observación a registrar

    public function mount($tramiteId)
    {
        $this->tramiteId = $tramiteId;
        $this->tramite = Tramite::findOrFail($tramiteId);
    }

    /**
     * Guardar o actualizar la observación del trámite
     */
    public function guardarObservacion()
    {
        $this->validate([
            'nuevaObservacion' => 'required|min:5',
        ]);

        $this->tramite->observaciones = $this->nuevaObservacion;
        $this->tramite->save();

        session()->flash('success', 'Observación registrada correctamente.');

        // Vacía el campo después de guardar
        $this->nuevaObservacion = '';

        // Refresca el trámite desde la base de datos
        $this->tramite->refresh();
    }

    public function render()
    {
        return view('livewire.ver-tramite');
    }
}
