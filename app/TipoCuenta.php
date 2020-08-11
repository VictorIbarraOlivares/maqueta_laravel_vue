<?php

namespace App;

use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $table = 'tipos_cuenta';
    
    protected $fillable = [
        'nombre'
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'tipo_cuenta_id', 'id');
    }
}
