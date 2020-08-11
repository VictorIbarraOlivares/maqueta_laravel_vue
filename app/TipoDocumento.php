<?php

namespace App;

use App\Documento;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documentos';

    protected $fillable = [
        'nombre',
        'codigo_dte'
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'tipo_documento_id', 'id');
    }
}
