<?php

use App\TipoCuenta;
use Illuminate\Database\Seeder;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'cuenta corriente';
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'cuenta rut';
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'cuenta vista';
        $tipoCuenta->save();
    }
}
