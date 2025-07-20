<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tramite;
use App\Models\User;

class DerivarTramite extends Component
{
    public $tramiteId;
    public $tramite;
    public $destinatarioId; // usuario seleccionado

    public function mount($tramiteId)
    {
        $this->tramiteId = $tramiteId;
        $this->tramite = Tramite::findOrFail($tramiteId);
    }

    public function derivarTramite()
    {
        // Validación: no permitir derivar si ya está derivado o finalizado
        if (in_array($this->tramite->estado, ['Derivado', 'Finalizado'])) {
            session()->flash('error', 'El trámite no puede ser derivado.');
            return;
        }

        $this->validate([
            'destinatarioId' => 'required|exists:users,id',
        ]);

        // Derivar trámite
        $this->tramite->user_id = $this->destinatarioId; // asignar nuevo responsable
        $this->tramite->estado = 'Derivado';
        $this->tramite->save();

        session()->flash('success', 'El trámite ha sido derivado correctamente.');
        return redirect()->route('panel.principal');
    }

    public function render()
    {
        $usuarios = User::where('id', '!=', $this->tramite->user_id)->get(); // excluir el usuario actual

        return view('livewire.derivar-tramite', [
            'usuarios' => $usuarios,
        ]);
    }
}
