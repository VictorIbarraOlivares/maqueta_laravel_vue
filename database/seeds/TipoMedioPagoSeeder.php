<?php

use Illuminate\Database\Seeder;
use App\TipoMedioPago;

class TipoMedioPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoMedioPago = new TipoMedioPago();
        $tipoMedioPago->nombre = 'transferencia';
        $tipoMedioPago->save();

        $tipoMedioPago = new TipoMedioPago();
        $tipoMedioPago->nombre = 'cheque';
        $tipoMedioPago->save();
    }
}
