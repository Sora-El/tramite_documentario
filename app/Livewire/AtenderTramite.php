<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tramite;

class AtenderTramite extends Component
{
    public $tramite;

    public function mount($tramiteId)
    {
        $this->tramite = Tramite::findOrFail($tramiteId);
    }

    public function aprobarTramite()
    {
        $this->tramite->estado = 'Aprobado';
        $this->tramite->save();

        session()->flash('success', 'El trámite fue marcado como aprobado.');

        return redirect()->route('panel.principal');
    }

    public function render()
    {
        return view('livewire.atender-tramite');
    }
}
