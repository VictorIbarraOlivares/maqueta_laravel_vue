<?php

use Illuminate\Database\Seeder;
use App\TipoDocumento;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre = 'cedible';
        $tipoDocumento->codigo_dte = 00;
        $tipoDocumento->save();

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre = 'guía de despacho';
        $tipoDocumento->codigo_dte = 50;
        $tipoDocumento->save();
    }
}
