<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tramite;
use Illuminate\Support\Facades\Auth;

class FinalizarTramite extends Component
{
    public $tramiteId;
    public $tramite;

    public function mount($tramiteId)
    {
        $this->tramiteId = $tramiteId;
        $this->tramite = Tramite::findOrFail($tramiteId);
    }

    public function finalizar()
    {
        // Verificación: Solo finalizar si el estado es 'Atendido'
        if ($this->tramite->estado !== 'Aprobado') {
            session()->flash('error', 'Solo es posible finalizar trámites en estado "Aprobado".');
            return;
        }

        // Marcar como finalizado
        $this->tramite->estado = 'Finalizado';
        $this->tramite->resultado = 'Trámite cerrado el ' . now()->format('d/m/Y H:i') . ' por usuario ID ' . Auth::id();
        $this->tramite->save();

        // (Opcional) Puedes guardar en tabla historial o auditoría

        session()->flash('success', 'El trámite se ha finalizado correctamente.');

        return redirect()->route('panel.principal');
    }

    public function render()
    {
        return view('livewire.finalizar-tramite');
    }
}
