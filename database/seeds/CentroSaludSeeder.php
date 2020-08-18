<?php

use App\CentroSalud;
use Illuminate\Database\Seeder;

class CentroSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centroSalud = new CentroSalud();
        $centroSalud->establecimiento = 'dirección de salud';
        $centroSalud->comuna = 'lo prado';
        $centroSalud->save();

        $centroSalud = new CentroSalud();
        $centroSalud->establecimiento = 'hospital de curacaví';
        $centroSalud->comuna = 'curacaví';
        $centroSalud->save();
        
    }
}
