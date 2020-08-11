<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table = 'ordenes_compra';

    protected $fillable = [
        'proveedor_id',
        'numero',
        'monto',
        'saldo',
        'estado'
    ];

    const OC_DISPONIBLE = 'disponible';
    const OC_NO_DISPONIBLE = 'no disponible';



    public function estaDisponible()
    {
        return $this->estado == OrdenCompra::OC_DISPONIBLE;
    }
}
