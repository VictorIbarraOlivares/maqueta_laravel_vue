<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'medio_pago_id',
        'entidad_financiera_id',
        'tipo_medio_pago_id',
        'tipo_cuenta_id',
        'banco_id',
        'razon_social',
        'rut',
        'digito_verificador',
        'numero_cuenta',
        'nombre_contacto',
        'email_contacto',
        'cargo_contacto'
    ];
}
