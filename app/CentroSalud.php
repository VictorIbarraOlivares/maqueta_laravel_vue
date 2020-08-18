<?php

namespace App;

use App\Documento;
use App\ResponsableRecepcion;
use Illuminate\Database\Eloquent\Model;

class CentroSalud extends Model
{
    protected $table = 'centros_salud';

    protected $fillable = [
        'establecimiento',
        'comuna',
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'centro_salud_id', 'id');
    }

    public function responsables_recepcion()
    {
        return $this->hasMany(ResponsableRecepcion::class, 'centro_salud_id', 'id');
    }
}
