<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMedioPago extends Model
{
    protected $table = 'tipos_medios_pago';
    
    protected $fillable = [
        'nombre'
    ];
}
