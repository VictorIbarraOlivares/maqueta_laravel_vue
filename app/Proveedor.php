<?php

namespace App;

use App\Banco;
use App\Documento;
use App\MedioPago;
use App\TipoCuenta;
use App\OrdenCompra;
use App\Representante;
use App\TipoMedioPago;
use App\EntidadFinanciera;
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

    public function representantes()
    {
        return $this->belongsToMany(Representante::class, 'representante_proveedor', 'proveedor_id', 'representante_id');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'proveedor_id', 'id');
    }

    public function ordenes_compra()
    {
        return $this->hasMany(OrdenCompra::class, 'proveedor_id', 'id');
    }

    public function medio_pago()
    {
        return $this->belongsTo(MedioPago::class, 'medio_pago_id');
    }

    public function entidad_financiera()
    {
        return $this->belongsTo(EntidadFinanciera::class, 'entidad_financiera_id');
    }

    public function tipo_medio_pago()
    {
        return $this->belongsTo(TipoMedioPago::class, 'tipo_medio_pago_id');
    }

    public function tipo_cuenta()
    {
        return $this->belongsTo(TipoCuenta::class, 'tipo_cuenta_id');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'banco_id');
    }
}
