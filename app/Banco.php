<?php

namespace App;

use App\Proveedor;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'bancos';
    
    protected $fillable = [
        'nombre'
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'banco_id', 'id');
    }
}
