<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponsableRecepcion extends Model
{
    protected $table = 'responsables_recepcion';

    protected $fillable = [
        'centro_salud_id',
        'nombre',
        'rut',
        'digito_verificador',
        'fono',
        'email'
    ];
}
