<?php

namespace App;

use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class TipoMedioPago extends Model
{
    protected $table = 'tipos_medios_pago';
    
    protected $fillable = [
        'nombre'
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'tipo_medio_pago_id', 'id');
    }
}
