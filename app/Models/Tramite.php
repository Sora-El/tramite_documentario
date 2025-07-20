<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $fillable = [
        'documento',
        'codigo',
        'solicitante',
        'fecha_inicio',
        'estado',
        'descripcion',
        'observaciones',
        'resultado',
        'archivo_adjunto',
        'user_id',
    ];
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
