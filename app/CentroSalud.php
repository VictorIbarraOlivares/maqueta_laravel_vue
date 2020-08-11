<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroSalud extends Model
{
    protected $table = 'centros_salud';

    protected $fillable = [
        'establecimiento',
        'comuna',
        'unidad_dependencia'
    ];
}
