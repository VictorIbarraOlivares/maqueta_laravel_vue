<?php

use App\MedioPago;
use Illuminate\Database\Seeder;

class MedioPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medioPago = new MedioPago();
        $medioPago->nombre = 'transferencia bancaria';
        $medioPago->save();
    }
}
