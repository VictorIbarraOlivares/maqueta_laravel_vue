<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = [
        'proveedor_id',
        'orden_compra_id',
        'tipo_documento_id',
        'centro_salud_id',
        'responsable_recepcion_id',
        'fecha_documento',
        'numero_documento',
        'monto_total',
        'fecha_recepcion',
        'observacion'
    ];
}
