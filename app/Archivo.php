<?php

namespace App;

use App\Documento;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivos';

    protected $fillable = [
        'documento_id',
        'url',
        'nombre'
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}
