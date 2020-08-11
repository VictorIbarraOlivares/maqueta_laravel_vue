<?php

namespace App;

use App\Proveedor;

class Representante extends User
{
    //

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'representante_proveedor', 'representante_id', 'proveedor_id');
    }

}
