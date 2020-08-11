<?php

namespace App;

use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class EntidadFinanciera extends Model
{
    protected $table = 'entidades_financieras';

    protected $fillable = [
        'nombre'
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'entidad_financiera_id', 'id');
    }
}
