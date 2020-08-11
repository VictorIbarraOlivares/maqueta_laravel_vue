<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadFinanciera extends Model
{
    protected $table = 'entidades_financieras';

    protected $fillable = [
        'nombre'
    ];
}
