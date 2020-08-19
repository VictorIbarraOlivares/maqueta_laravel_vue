<?php

namespace App;

use App\Proveedor;

class Representante extends User
{
    //

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'proveedor_representante', 'representante_id', 'proveedor_id');
    }

}
