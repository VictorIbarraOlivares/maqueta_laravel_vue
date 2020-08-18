<?php

use App\ResponsableRecepcion;
use Illuminate\Database\Seeder;

class ResponsableRecepcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsableRecepcion = new ResponsableRecepcion();
        $responsableRecepcion->centro_salud_id = 1;
        $responsableRecepcion->nombre = 'lorena gonzález gamboa';
        $responsableRecepcion->rut = 14415718;
        $responsableRecepcion->digito_verificador = 4;
        $responsableRecepcion->unidad_dependencia = 'farmacia';
        $responsableRecepcion->fono = '224834920 / 224834939';
        $responsableRecepcion->email = 'lgonzalez@corporacionloprado.cl';
        $responsableRecepcion->save();

        $responsableRecepcion = new ResponsableRecepcion();
        $responsableRecepcion->centro_salud_id = 2;
        $responsableRecepcion->nombre = 'lorena zoñez gonzalez';
        $responsableRecepcion->rut = 9846749;
        $responsableRecepcion->digito_verificador = 1;
        $responsableRecepcion->unidad_dependencia = 'jefa abastecimiento';
        $responsableRecepcion->fono = '225745437';
        $responsableRecepcion->email = 'lorena.zonez.g@redsalud.gov.cl';
        $responsableRecepcion->save();

        $responsableRecepcion = new ResponsableRecepcion();
        $responsableRecepcion->centro_salud_id = 2;
        $responsableRecepcion->nombre = 'mario tejo garcía';
        $responsableRecepcion->rut = 13231509;
        $responsableRecepcion->digito_verificador = 4;
        $responsableRecepcion->unidad_dependencia = 'encargado de bodega';
        $responsableRecepcion->fono = '225745491';
        $responsableRecepcion->email = 'mario.tejo@redsalud.gov.cl';
        $responsableRecepcion->save();

        $responsableRecepcion = new ResponsableRecepcion();
        $responsableRecepcion->centro_salud_id = 2;
        $responsableRecepcion->nombre = 'jocelyn mella santander';
        $responsableRecepcion->rut = 18083237;
        $responsableRecepcion->digito_verificador = 8;
        $responsableRecepcion->unidad_dependencia = 'administrativo de bodega';
        $responsableRecepcion->fono = '225745467';
        $responsableRecepcion->email = 'jocelyn.mella@redsalud.gov.cl';
        $responsableRecepcion->save();

    }
}
