<?php

namespace App;

use App\CentroSalud;
use Illuminate\Database\Eloquent\Model;

class ResponsableRecepcion extends Model
{
    protected $table = 'responsables_recepcion';

    protected $fillable = [
        'centro_salud_id',
        'nombre',
        'rut',
        'digito_verificador',
        'unidad_dependencia',
        'fono',
        'email'
    ];

    public function centro_salud()
    {
        return $this->belongsTo(CentroSalud::class, 'centro_salud_id');
    }
}
