<?php

namespace App;

use App\Archivo;
use App\Proveedor;
use App\OrdenCompra;
use App\CentroSalud;
use App\TipoDocumento;
use App\ResponsableRecepcion;
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

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function orden_compra()
    {
        return $this->belongsTo(OrdenCompra::class, 'orden_compra_id');
    }

    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function centro_salud()
    {
        return $this->belongsTo(CentroSalud::class, 'centro_salud_id');
    }

    public function responsable_recepcion()
    {
        return $this->belongsTo(ResponsableRecepcion::class, 'responsable_recepcion_id');
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'documento_id', 'id');
    }

}
