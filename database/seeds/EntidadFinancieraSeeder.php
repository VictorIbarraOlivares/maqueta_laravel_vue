<?php

use App\EntidadFinanciera;
use Illuminate\Database\Seeder;

class EntidadFinancieraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidadFinanciera = new EntidadFinanciera();
        $entidadFinanciera->nombre = 'banco bci';
        $entidadFinanciera->save();

        $entidadFinanciera = new EntidadFinanciera();
        $entidadFinanciera->nombre = 'banco de chile';
        $entidadFinanciera->save();

        $entidadFinanciera = new EntidadFinanciera();
        $entidadFinanciera->nombre = 'scotiabank';
        $entidadFinanciera->save();

        $entidadFinanciera = new EntidadFinanciera();
        $entidadFinanciera->nombre = 'santander';
        $entidadFinanciera->save();

        $entidadFinanciera = new EntidadFinanciera();
        $entidadFinanciera->nombre = 'banco falabella';
        $entidadFinanciera->save();
    }
}
