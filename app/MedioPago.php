<?php

namespace App;

use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class MedioPago extends Model
{
    protected $table = 'medios_pago';

    protected $fillable = [
        'nombre'
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'medio_pago_id', 'id');
    }
}
